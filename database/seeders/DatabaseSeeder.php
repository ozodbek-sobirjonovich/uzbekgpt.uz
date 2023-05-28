<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $path = resource_path('/dev_tools/currency.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Currency table seeded!');
        $path2 = resource_path('/dev_tools/openai_table.sql');
        DB::unprepared(file_get_contents($path2));
        $path3 = resource_path('/dev_tools/openai_chat_categories_table.sql');
        DB::unprepared(file_get_contents($path3));
        $this->command->info('Currency table seeded!');
    }
}
