<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Florist;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;

class ProductTest extends TestCase
{
    /** @test */
    public function productsCanBeScopedAsArrangements()
    {
        // setup
        $arrangementProduct = Product::factory()->create([
            'type' => 'Arrangement',
        ]);
        $cutFlowerProduct = Product::factory()->create([
            'type' => 'Cut Flower',
        ]);

        // act
        $products = Product::arrangements()->get();

        // assert
        $this->assertEquals(
            1,
            $products->count()
        );

        $this->assertEquals(
            'Arrangement',
            $products->first()->type
        );
    }

    /** @test */
    public function productsCanBeScopedAsPurchased()
    {
        // setup
        $purchasedProduct = Product::factory()->create();
        $nobodyWantedProduct = Product::factory()->create();

        $customer = Customer::factory()->create([
            'email' => 'customer@example.com',
        ]);
        $florist  = Florist::factory()->create();
        $order    = Order::factory()->create([
            'florist_id' => $florist->id,
            'customer_id' => $customer->id,
        ]);

        $purchasedProduct->orders()->attach($order->id);

        // act
        $products = Product::purchased()->get();


        // assert
        $this->assertEquals(
            1,
            $products->count()
        );

        $this->assertInstanceOf(
            Order::class,
            $products->first()->orders->first()
        );
    }
}
