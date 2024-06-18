<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        $timestamp = now()->format('YmdHis'); // Format the timestamp
        $randomString = Str::random(10); // Generate a random string to fill the remaining length

        $pricePerSlot = random_int(1, 10) * 10;

        $teams = [ 'Brgy Ginebra', 'San Miguel', 'Magnolia', 'Converge', 'Bossing', 'Phoenix',  'NLEX', 'NorthPort', 'Rain or Shine', 'Meralco', 'TNT', 'TerraFirma' ];
       
        shuffle($teams);

        $teamsPlaying = array_slice($teams, 0, 2);


        // Generate a random date between now and 10 days from now
        $randomDate = Carbon::now()->addDays(rand(0, 10));

        return [
            'reference_id' => $timestamp . '-' . $randomString,
            'game' => $teamsPlaying[0] . ' vs. ' . $teamsPlaying[1],
            'status' => $this->faker->randomElement(['active', 'pending']),
            'winning_prize' => ($pricePerSlot * 100) -  ( ($pricePerSlot * 100) * 0.2 ),
            'price_per_slot' => $pricePerSlot,
            'game_date' => $randomDate,
            'user_id' => 1
        ];
    }

   
}
