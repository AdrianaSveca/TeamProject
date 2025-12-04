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
        ]);

        // Calculate BMI
        // Formula: weight (kg) / [height (m)]^2
        $height_m = $request->height / 100;
        $bmiScore = $request->weight / ($height_m * $height_m);
        
        $bmiResult = match(true) {
            $bmiScore < 18.5 => 'Underweight',
            $bmiScore < 25 => 'Healthy',
            $bmiScore < 30 => 'Overweight',
            default => 'Obese',
        };

        // Find Products based on Goal
        $query = Products::query()->with('category');

        // Matching logic based on your database categories
        if ($request->goal == 'muscle') {

            $query->whereHas('category', function ($q) {
                $q->where('category_name', 'like', '%Nutrition%')
                  ->orWhere('category_name', 'like', '%Supplements%');
            });
        } elseif ($request->goal == 'weight_loss') {

            $query->whereHas('category', function ($q) {
                $q->where('category_name', 'like', '%Fitness Equipment%')
                  ->orWhere('category_name', 'like', '%Nutrition%')
                  ->orWhere('category_name', 'like', '%Supplements%');
            });
        } else {

            $query->whereHas('category', function ($q) {
                $q->where('category_name', 'like', '%Supplements%')
                  ->orWhere('category_name', 'like', '%Other%')
                  ->orWhere('category_name', 'like', '%Fitness Accessories%');
            });
        }

        // So if user is women, avoid recommending men's products.
        if ($request->gender == 'Female') {
            $query->where('product_name', 'not like', '%Men%');
        }

        $recommendations = $query->limit(3)->get();

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
        return view('quiz-results', compact('recommendations', 'bmiScore', 'bmiResult'));
    }
    public function showResults(): View|RedirectResponse
    {
        // Get the latest BMI record for this user
        $bmiRecord = BMI::where('user_id', Auth::id())->latest('bmi_date')->first();

        // If they haven't taken the quiz, we redirect them to take it (quiz page)
        if (!$bmiRecord) {
            return redirect()->route('quiz.index');
        }


        // We will show general recommendations based on BMI status
        $query = Products::query()->with('category');

        if ($bmiRecord->bmi_feedback == 'Underweight') {
             $query->whereHas('category', fn($q) => $q->where('category_name', ['Nutrition', 'Fitness Equipment', 'Supplements']));
        } elseif ($bmiRecord->bmi_feedback == 'Overweight' || $bmiRecord->bmi_feedback == 'Obese') {
             $query->whereHas('category', fn($q) => $q->where('category_name', ['Fitness Equipment', 'Nutrition', 'Supplements']));
        } else {
             $query->whereHas('category', fn($q) => $q->where('category_name', ['Other', 'Supplements', 'Fitness Accessories']));
        }

        $recommendations = $query->limit(3)->get();

        return view('quiz-results', [
            'bmiScore' => $bmiRecord->bmi_result,
            'bmiResult' => $bmiRecord->bmi_feedback,
            'recommendations' => $recommendations
        ]);
    }
}