<?php

use App\Team;
use App\User;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $randomNumber = rand(123, 789);

            $team = Team::factory()->create([
                'name' => "CIS Kuningan $randomNumber",
                
            ]);

            $gudang = User::factory()->create([
                'name'           => "Gudang $randomNumber",
                'email'          => "gudang$randomNumber@gmail.com",
                'password'       => bcrypt('password'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $gudang->roles()->sync(2);

            $ass_gudang = User::factory()->create([
                'name'           => "Assisten Gudang $randomNumber",
                'email'          => "ass_gudang$randomNumber@gmail.com",
                'password'       => bcrypt('password'),
                'team_id'        => $team->id,
                'remember_token' => null,
            ]);
            $ass_gudang->roles()->sync(2);
        }
    }
}
