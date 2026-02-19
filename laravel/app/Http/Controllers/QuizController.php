<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Products;
use App\Models\BMI;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(): View
    {
        return view('quiz');
    }

    public function submit(Request $request): View
    {
        // Validate Data
        $request->validate([
            'goal' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|numeric|min:16|max:100',
            'height' => 'required|numeric|min:100|max:250',
            'weight' => 'required|numeric|min:30|max:300',
            'experience' => 'required|string|in:beginner,intermediate,advanced,expert',
            'activity' => 'required|numeric|in:1.2,1.375,1.55,1.725,1.9',
            'days' => 'required|integer|min:2|max:6',
        ]);

        // 1) BMI calculation
        $height_m = $request->height / 100;
        $bmiScore = $request->weight / ($height_m * $height_m);

        $bmiResult = match (true) {
            $bmiScore < 18.5 => 'Underweight',
            $bmiScore < 25 => 'Healthy',
            $bmiScore < 30 => 'Overweight',
            default => 'Obese',
        };

        $bmiStatus = $bmiResult;

        // 2) Calories calculation
        $age = (int) $request->age;
        $height = (float) $request->height;
        $weight = (float) $request->weight;
        $gender = $request->gender; // "Male", "Female", "Other"
        $activity = (float) $request->activity;
        $goal = $request->goal;     // muscle, weight_loss, general_health
        $experience = $request->experience;
        $days = (int) $request->days;

        // BMR Calculation using Mifflin-St Jeor formula
        $maleBmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        $femaleBmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

        if ($gender === 'Male') {
            $bmr = $maleBmr;
        } elseif ($gender === 'Female') {
            $bmr = $femaleBmr;
        } else { 
            $bmr = ($maleBmr + $femaleBmr) / 2;
        }


        // Maintenance calories
        $maintenance = $bmr * $activity;

        // Goal calories 
        if ($goal === 'weight_loss') {
            $goalCalories = $maintenance - 500;
        } elseif ($goal === 'muscle') {
            $goalCalories = $maintenance + 500;
        } else {
            if ($bmiScore > 25) {
                $goalCalories = $maintenance - 250;
            } elseif ($bmiScore < 18.5) {
                $goalCalories = $maintenance + 250;
            } else {
                $goalCalories = $maintenance;
            }
        }

        
        // 3) Macro Calculation

        if ($goal === 'weight_loss') { 
            if ($bmiStatus === 'Healthy') $proteinPerKg = 2.2; 
            elseif ($bmiStatus === 'Overweight') $proteinPerKg = 2.3; 
            elseif ($bmiStatus === 'Obese') $proteinPerKg = 2.5; 
            else $proteinPerKg = 2.0; 
        } 
        
        elseif ($goal === 'muscle') { 
            if ($bmiStatus === 'Underweight') $proteinPerKg = 2.2; 
            elseif ($bmiStatus === 'Healthy') $proteinPerKg = 2.0; 
            elseif ($bmiStatus === 'Overweight') $proteinPerKg = 1.9; 
            else $proteinPerKg = 1.8; 
        } 
        
        else { 
            if ($bmiStatus === 'Underweight') $proteinPerKg = 2.0; 
            elseif ($bmiStatus === 'Healthy') $proteinPerKg = 1.8; 
            elseif ($bmiStatus === 'Overweight') $proteinPerKg = 2.0; 
            else $proteinPerKg = 2.2; 
        }

        // Estimate body fat %
        if ($gender === 'Male') {
            $genderValue = 1;
        } elseif ($gender === 'Female') {
            $genderValue = 0;
        } else {
            $genderValue = 0.5;
        }

        $bodyFatPercentage = (1.20 * $bmiScore) + (0.23 * $age) - (10.8 * $genderValue) - 5.4;

        // Prevent unrealistic values
        $bodyFatPercentage = max(8, min($bodyFatPercentage, 60));

        // Convert to decimal
        $bodyFatDecimal = $bodyFatPercentage / 100;

        // Lean Body Mass
        $leanMass = $weight * (1 - $bodyFatDecimal);

        // Protein   
        $proteinGrams = $leanMass * $proteinPerKg;
        $proteinCalories = $proteinGrams * 4;

        // Fat = 25% calories
        $fatCalories = $goalCalories * 0.25;
        $fatGrams = $fatCalories / 9;

        // Carbs = remaining calories
        $carbCalories = $goalCalories - ($proteinCalories + $fatCalories);
        $carbGrams = $carbCalories / 4;


        // 4) Workout Plan 
        $plan = '';

        if ($days === 2 && in_array($experience, ['advanced', 'expert'])) {
            $plan = '
                Full Body Workout 2x per week <br>
                4 sets of 12-15 reps <br>
                <br>
                Deadlift <br>
                Squats <br>
                Incline bench press <br>
                Barbell rows <br>
                Dumbell bicep curl <br>
                Skullcrushers <br>
                Shrugs <br>
            ';
        }

        if ($days === 2 && in_array($experience, ['beginner', 'intermediate'])) {
            $plan = '
                Full Body split 2x per week <br>
                3 sets of 12-15 reps <br>
                <br>
                Sumo deadlift <br>
                Leg press <br>
                Incline smith-machine press <br>
                Barbell rows <br>
                Dumbell bicep curl <br>
                Skullcrushers <br>
                Shrugs <br>
            ';
        }

        if ($days === 3 && in_array($experience, ['advanced', 'expert'])) {
            $plan = '
                Push / Pull / Legs split <br>
                3 sets of 10-12 reps<br>
                <br>
                Bench press <br>
                Cable fly <br>
                Chest press <br>
                Tricep dips <br>
                Tricep pushdown <br>
                Shoulder press <br>
                <br>
                Deadlift <br>
                T-bar row <br>
                Seated cable row <br>
                Bayesian curls <br>
                Hammer curls <br>
                Wrist extentions <br>
                <br>
                Squats <br>
                RDLs <br>
                Leg extentions <br>
                Leg curls <br>
                Calf raises <br>
            ';
        }

        if ($days === 3 && in_array($experience, ['beginner', 'intermediate'])) {
            $plan = '
                Push / Pull / Legs split <br>
                3 sets of 10-12 reps<br>
                <br>
                Smith-machine press <br>
                Cable fly <br>
                Chest press <br>
                Seated dips <br>
                Tricep pushdown <br>
                Shoulder press <br>
                <br>
                Sumo deadlift <br>
                Lat pulldown <br>
                Seated cable row <br>
                Bayesian curls <br>
                Hammer curls <br>
                Wrist extentions<br>
                <br>
                Hack squat<br>
                Leg press<br>
                Leg extentions <br>
                Leg curls <br>
                Calf raises <br>
            ';
        }

        if ($days === 4 && in_array($experience, ['advanced', 'expert'])) {
            $plan = '
                Upper / Lower split 2x per week<br>
                3 sets of 6-10 reps<br>
                <br>
                Bench press <br>
                Lat pull down <br>
                Pec dec fly <br>
                Chest supported row <br>
                JM Press <br>
                Lateral raises <br>
                Preacher curls <br>
                Wrist curl <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                Tibialis raises <br>
                Cable ab crunch <br>
                Landmine rotations<br>
            ';
        }

        if ($days === 4 && in_array($experience, ['beginner', 'intermediate'])) {
            $plan = '
                Upper / Lower split 2x per week<br>
                3 sets of 6-10 reps<br>
                <br>
                Smith machine press <br>
                Lat pulldown <br>
                Pec dec fly <br>
                Chest supported row <br>
                Tricep pushdown <br>
                Lateral raises <br>
                Preacher curls <br>
                Wrist curl <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                Cable ab crunch <br>
            ';
        }

        if ($days === 5 && in_array($experience, ['advanced', 'expert'])) {
            $plan = '
                Upper / Lower / Push / Pull / Leg split<br>
                3 sets of 6-8 reps<br>
                <br>
                Bench press <br>
                Barbell row <br>
                Pec dec fly <br>
                Seated cable row <br>
                JM Press <br>
                Lateral raises <br>
                Preacher curls <br>
                Wrist curl <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                Tibialis raises <br>
                Cable ab crunch <br>
                Cable woodchoppers<br>
                <br>
                Bench press <br>
                Cable fly <br>
                Chest press <br>
                Tricep dips <br>
                Tricep pushdown <br>
                Shoulder press <br>
                <br>
                Deadlift <br>
                T-bar row <br>
                Seated cable row <br>
                Bayesian curls <br>
                Hammer curls <br>
                Wrist extentions <br>
                <br>
                Squats <br>
                RDLs <br>
                Leg extentions <br>
                Leg curls <br>
                Calf raises <br>
            ';
        }

        if ($days === 5 && in_array($experience, ['beginner', 'intermediate'])) {
            $plan = '
                Upper / Lower / Push / Pull / Leg split<br>
                3 sets of 6-8 reps<br>
                <br>
                Smith machine press <br>
                Lat pulldown <br>
                Pec dec fly <br>
                Seated cable row <br>
                Tricpe pushdown <br>
                Lateral raises <br>
                Preacher curls <br>
                Wrist curl <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                Cable ab crunch <br>
                <br>
                Smith-machine press <br>
                Cable fly <br>
                Chest press <br>
                Seated dips <br>
                Tricep pushdown <br>
                Shoulder press <br>
                <br>
                Sumo eadlift <br>
                Lat pulldown <br>
                Seated cable row <br>
                Bayesian curls <br>
                Hammer curls <br>
                Wrist extentions<br>
                <br>
                Hack squat<br>
                Leg press<br>
                Leg extentions <br>
                Leg curls <br>
                Calf raises <br>
            ';
        }

        if ($days === 6 && in_array($experience, ['advanced', 'expert'])) {
            $plan = '
                Bro split<br>
                Chest / Triceps / Back / Biceps / Legs / Shoulders<br>
                3 sets of 8-12 reps<br>
                <br>
                Bench press <br>
                Pec dec fly <br>
                Chest press <br>
                High to low cable fly <br>
                <br>
                Tricep dips <br>
                JM press <br>
                Tricep pushdown <br>
                Cable ab crunch <br>
                Landmine rotations<br>
                <br>
                Deadlift <br>
                Barbell row <br>
                Seated cable row <br>
                Close-grip lat pulldown <br>
                <br>
                Preacher curl <br>
                Bayesian curl <br>
                Hammer curl <br>
                Wrist curls <br>
                Wrist extentions <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                Tibialis raises <br>
                <br>
                Shoulder press  <br>
                Face pulls  <br>
                Lateral raises  <br>
                Shrugs  <br>
            ';
        }

        if ($days === 6 && in_array($experience, ['beginner', 'intermediate'])) {
            $plan = '
                Bro split<br>
                Chest / Triceps / Back / Biceps / Legs / Shoulders<br>
                3 sets of 8-12 reps<br>
                <br>
                Smith-machine press <br>
                Pec dec fly <br>
                Chest press <br>
                High to low cable fly <br>
                <br>
                Seated dips <br>
                JM press <br>
                Tricep pushdown <br>
                Cable ab crunch <br>
                <br>
                Sumo deadlift <br>
                Wide-grip lat pulldown <br>
                Seated cable row <br>
                Close-grip lat pulldown <br>
                <br>
                Preacher curl <br>
                Bayesian curl <br>
                Hammer curl <br>
                Wrist curls <br>
                <br>
                Hip adduction <br>
                Leg curl <br>
                Leg press<br>
                Stiff-leg deadlift <br>
                Leg extentions <br>
                Calf raises <br>
                <br>
                Shoulder press  <br>
                Face pulls  <br>
                Lateral raises  <br>
                Shrugs  <br>
            ';
        }

        // 4) Recommendations 
        $query = Products::query();

if ($goal === 'muscle') {

    $query->where(function($q) {
        $q->where('product_name', 'like', '%Whey%')
          ->orWhere('product_name', 'like', '%Creatine%')
          ->orWhere('product_name', 'like', '%Pre-Workout%');
    });

} elseif ($goal === 'weight_loss') {

    $query->where(function($q) {
        $q->where('product_name', 'like', '%Meal Replacement%')
          ->orWhere('product_name', 'like', '%Granola%')
          ->orWhere('product_name', 'like', '%Electrolyte%');
    });

} else { 

    $query->where(function($q) {
        $q->where('product_name', 'like', '%Omega%')
          ->orWhere('product_name', 'like', '%Vitamin D3%')
          ->orWhere('product_name', 'like', '%Vegan Protein%');
    });

}

$recommendations = $query->inRandomOrder()->limit(3)->get();

        

        // Save Result in database 
        if (Auth::check()) {
            BMI::create([
                'user_id' => Auth::id(),
                'bmi_height' => $request->height,
                'bmi_weight' => $request->weight,
                'bmi_result' => $bmiScore,
                'bmi_feedback' => $bmiResult,
                'bmi_date' => now(),
            ]);
        }

        // Show Results
        return view('quiz-results', compact(
            'recommendations',
            'bmiScore',
            'bmiResult',
            'bmiStatus',
            'maintenance',
            'goalCalories',
            'plan',
            'proteinGrams',
            'fatGrams',
            'carbGrams'
        ));
    }

    public function showResults(): View|RedirectResponse
    {
        // Get the latest BMI record for this user
        $bmiRecord = BMI::where('user_id', Auth::id())->latest('bmi_date')->first();

        if (!$bmiRecord) {
            return redirect()->route('quiz.index');
        }

        // Recommendations based on BMI
        $query = Products::query()->with('category');

        if ($bmiRecord->bmi_feedback == 'Underweight') {
            $query->whereHas('category', fn($q) => $q->where('category_name', ['Nutrition', 'Fitness Equipment', 'Supplements', 'Fitness Accessories']));
        } elseif ($bmiRecord->bmi_feedback == 'Overweight' || $bmiRecord->bmi_feedback == 'Obese') {
            $query->whereHas('category', fn($q) => $q->where('category_name', ['Fitness Equipment', 'Nutrition', 'Supplements', 'Other']));
        } else {
            $query->whereHas('category', fn($q) => $q->where('category_name', ['Other', 'Supplements', 'Fitness Accessories', 'Nutrition']));
        }

        $recommendations = $query->limit(3)->get();

        // Safe defaults so updated results doesnt crashe
        $plan = 'Retake the quiz to generate your calories and training plan.<br>';
        $maintenance = 0;
        $goalCalories = 0;
        $proteinGrams = 0;
        $fatGrams = 0;
        $carbGrams = 0;

        return view('quiz-results', [
            'bmiScore' => $bmiRecord->bmi_result,
            'bmiResult' => $bmiRecord->bmi_feedback,
            'bmiStatus' => $bmiRecord->bmi_feedback,
            'maintenance' => $maintenance,
            'goalCalories' => $goalCalories,
            'plan' => $plan,
            'recommendations' => $recommendations,
            'proteinGrams' => $proteinGrams,
            'fatGrams' => $fatGrams,
            'carbGrams' => $carbGrams,
        ]);
    }
}
