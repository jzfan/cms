<?php

use App\Food;
use App\User;
use App\Order;
use App\Remark;
use App\Category;
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

        $remarks = factory(Remark::class, 5)->create();

        $categories = factory(Category::class, 7)->create(); 
        foreach ($categories as $category) {
            factory(Food::class, rand(5, 22))->create(['category_id' => $category->id]);
        }

        $this->call(OrderSeeder::class);

    }
}
