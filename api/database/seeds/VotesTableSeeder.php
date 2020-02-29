<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            factory(App\Vote::class)->create(['user_id' => random_int(1, 10), 'gradient_id' => random_int(1, 100)]);
        }
    }
}
