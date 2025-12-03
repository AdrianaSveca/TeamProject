<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BMI; // Make sure you have this model
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Show the form
    public function index()
    {
        return view('quiz');
    }

    // Process the form
    public function submit(Request $request)
    {
        // 1. Validation
        $request->validate([
            'goal' => 'required',
            'height' => 'required|numeric|min:50',
            'weight' => 'required|numeric|min:20',
            'age' => 'required|numeric',
            'gender' => 'required'
        ]);

        // 2. Calculate BMI
        $height_m = $request->height / 100;
        $bmiScore = $request->weight / ($height_m * $height_m);
        $bmiResult = $this->getBMIStatus($bmiScore);

        // 3. Find Products (Logic: Match Goal + Filter by Gender if needed)
        $query = Products::query();

        // Goal Logic
        if ($request->goal == 'muscle') {
            $query->where('category_id', 1); // Example: 1 = Protein/Muscle
        } elseif ($request->goal == 'weight_loss') {
            $query->where('category_id', 2); // Example: 2 = Slimming
        } else {
            $query->where('category_id', 3); // General Wellness
        }

        // Gender Logic (Optional: Filter out "Men's" products for Women)
        if ($request->gender == 'Female') {
            $query->where('name', 'not like', '%Men%');
        }

        $recommendations = $query->limit(3)->get();

        // 4. SAVE TO DB (ONLY IF LOGGED IN)
        if (Auth::check()) {
            BMI::create([
                'user_id' => Auth::id(),
                'height' => $request->height,
                'weight' => $request->weight,
                'bmi_score' => $bmiScore,
                'result' => $bmiResult
            ]);
        }

        // 5. Return Results View
        return view('quiz-results', compact('recommendations', 'bmiScore', 'bmiResult'));
    }

    private function getBMIStatus($score) {
        if ($score < 18.5) return 'Underweight';
        if ($score < 25) return 'Healthy';
        if ($score < 30) return 'Overweight';
        return 'Obese';
    }
}