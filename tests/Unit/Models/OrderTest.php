<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Florist;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ordersBelongToACustomer()
    {
        $customer = Customer::create([
            'name' => 'Bob',
        ]);
        $florist = Florist::create([
            'name' => 'Jeff',
            'position' => 'Assistant Florist',
        ]);
        $order = Order::create([
            'total' => 10000,
            'note'  => 'Thanks, Julia',
            'florist_id' => $florist->id,
            'customer_id' => $customer->id,
        ]);

        $this->assertInstanceOf(
            Customer::class,
            $order->customer
        );

        $this->assertEquals(
            'Bob',
            $order->customer->name
        );
    }

    /** @test */
    public function ordersBelongToACustomerWithFactories()
    {
        $customer = Customer::factory()->create([
            'email' => 'customer@example.com',
        ]);
        $florist  = Florist::factory()->create();
        $order    = Order::factory()->create([
            'florist_id' => $florist->id,
            'customer_id' => $customer->id,
        ]);

        $this->assertInstanceOf(
            Customer::class,
            $order->customer
        );

        $this->assertEquals(
            $customer->name,
            $order->customer->name
        );

        $this->assertEquals(
            'customer@example.com',
            $order->customer->email
        );
    }

    /** @test */
    public function ordersBelongToManyProducts()
    {
        $customer = Customer::factory()->create();
        $florist  = Florist::factory()->create();
        $order    = Order::factory()->create([
            'florist_id' => $florist->id,
            'customer_id' => $customer->id,
        ]);

        $product = Product::factory()->create();

        Product::factory()->count(4)->create();

        $order->products()->sync([$product->id]);

        $this->assertInstanceOf(
            Product::class,
            $order->products->first()
        );
        
        $this->assertEquals(
            1,
            $order->products->count()
        );
        
        $this->assertEquals(
            $product->price,
            $order->products->first()->price
        );
    }
}
