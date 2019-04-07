<?php

use App\User;
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
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
        	'email' => 'admin@admin.com',
        	'password' => password_hash('123', PASSWORD_DEFAULT),
        	'role' => 'admin'
        ]);

        factory(User::class, 55)->create();
    }
}
