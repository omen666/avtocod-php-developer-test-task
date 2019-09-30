<?php

use App\Models\Users;
use App\Models\Messages;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Users::class)->times(\mt_rand(1, 5))->create();
        factory(Messages::class)->times(\mt_rand(5, 10))->create();
    }
}
