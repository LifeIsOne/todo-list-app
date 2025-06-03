<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    public function run(): void
    {
        $todos = [
            '미라클 모닝',
            '코딩테스트',
            '운동하기',
            '책 읽기',
            'amuz 합격하기',
        ];

        foreach ($todos as $i => $text) {
            Todo::create([
                'text' => $text,
                'completed' => $i % 2 == 0, // 1 = true
            ]);
        }
    }
}
