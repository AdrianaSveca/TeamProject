<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeepSeekService;

class ChatbotController extends Controller
{
    protected $deepseek;

    public function __construct(DeepSeekService $deepseek)
    {
        $this->deepseek = $deepseek;
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');

        $response = $this->deepseek->ask($message);

        return response()->json([
            'reply' => $response['choices'][0]['message']['content'] ?? 'No response'
        ]);
    }
}