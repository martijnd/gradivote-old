<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function (User $user) {
            $user->gradients()->createMany(
                factory(App\Gradient::class, 10)->make()->toArray());
        });
    }
}
