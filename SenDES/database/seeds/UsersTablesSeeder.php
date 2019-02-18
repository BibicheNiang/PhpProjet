<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bibiche',
            'email' => 'binou@gmail.com',
            'password' =>Hash::make('passer'),
            'remember_token' =>str_random(10),
        ]);
    }
}
