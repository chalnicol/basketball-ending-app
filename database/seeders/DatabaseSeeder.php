<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Card;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        for ($i = 1; $i < 9; $i++) {

            $card = Card::factory()->create();

            for ($j = 0; $j < 100; $j++) {
                $card->slots()->create([
                    'number' => $j,
                    'card_id' => $card->id,
                ]);
            }

        }
    }
}
