<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Appointment;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10;$i++){
            $appointments=rand(5,20);
            User::factory(1)->has(Appointment::factory()->count($appointments))->create();
        }
    }
}
