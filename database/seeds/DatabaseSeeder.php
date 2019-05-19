<?php

use App\Food;
use App\User;
use App\Order;
use App\Remark;
use App\Category;
use Carbon\Carbon;
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

        $foods = Food::all();

        foreach (range(100, 200) as $n) {
            $items = $foods->random(rand(1, 3))->map(function ($food) {
                $qty = rand(1, 3);
                return [
                    'id' => $food->id,
                    'abbr' => $food->abbr,
                    'price' => $food->price,
                    'qty' => $qty,
                    'tax' => number_format($qty * $food->price * $food->tax_rate/100, 2),
                    'subtotal' => number_format($qty * $food->price, 2)
                ];
            })->toArray();
            // $total = array_sum(array_column($items, 'subtotal'));
            // $tax = array_sum(array_column($items, 'tax'));
            factory(Order::class)->create([
                'items' => $items,
                'total' => array_sum(array_column($items, 'subtotal')),
                'tax' => array_sum(array_column($items, 'tax')),
                'remarks' => $remarks->random(rand(1, 3)),
                'created_at' => Carbon::now()->subDays(rand(0, 10))->subMinutes(rand(1, 120))
            ]);
        }


    }
}
