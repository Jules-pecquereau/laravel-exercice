<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Univers;


class UniversSeeder extends Seeder
{

    public function run(): void
    {
        Univers::factory()
        ->count(5)
        ->create();
    }
}
