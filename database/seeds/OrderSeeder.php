<?php

use App\Food;
use App\Order;
use App\Remark;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = Food::all();
        $remarks = Remark::all();
        
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
                'created_at' => Carbon::now()->subDays(0)->subMinutes(rand(1, 600))
            ]);
        }
    }
}
