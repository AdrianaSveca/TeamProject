<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeepSeekService
{
    public function ask($message)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.deepseek.key'),
            'Content-Type' => 'application/json',
        ])->post(config('services.deepseek.base_url') . '/chat/completions', [
            'model' => 'deepseek-chat',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant for an ecommerce website offering health and wellness themed products. Your role is to imitate the role of a personal trainer. Only answer prompts related to fitness and wellness advice. If the prompt is not related to this topic, reply: Sorry, I can only provide advice on fitness and wellness.'
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ]
        ]);

        Log::info('DeepSeek response:', $response->json());
        return $response->json();
    }
}