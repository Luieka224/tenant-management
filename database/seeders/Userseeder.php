<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cnu = new CreateNewUser();

        $cnu->create([
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => '12341234',
            'password_confirmation' => '12341234',
            'role' => 1,
        ]);
    }
}
