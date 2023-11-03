<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'discount' => fake()->randomFloat(2, 0, 20),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order, $attributes) {
            if (isset($attributes['products'])) {
                $order->products()->attach($attributes['products']);
            } else {
                DB::beginTransaction();
                try {
                    $products = Product::factory()->count(3)->create();
                    foreach ($products as $product) {
                        $quantity = fake()->numberBetween(1, ($product->quantity / 2));
                        $order->products()->attach($product->id, ['quantity' => $quantity]);
                        $product->quantity -= $quantity;
                        $product->save();
                        $product_discount = ($product->discount / 100) * $product->price;
                        $product_price_after_discount = ($product->price - $product_discount);
                        $product_quantity_price = $product_price_after_discount * $quantity;
                        $orderProduct = $order->products()->where('product_id', $product->id)->first()->pivot;
                        $orderProduct->price = $product_price_after_discount;
                        $orderProduct->save();
                        $order->total += $product_quantity_price;
                        $order->total -= (($order->discount / 100) * $product_quantity_price);
                        $order->save();
                        DB::commit();
                    }
                } catch (\Throwable $th) {
                    $order->delete();
                    throw $th;
                }
            }
        });
    }
}
