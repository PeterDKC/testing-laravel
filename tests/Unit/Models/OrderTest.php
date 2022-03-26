<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Florist;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ordersBelongToCustomers()
    {
        $customer = Customer::create([
            'name' => 'jeff',
        ]);
        $florist = Florist::create([
            'name' => 'bob',
            'position' => 'asdf',
        ]);
        $order = Order::create([
            'total' => 0,
            'note' => 'asdf',
            'customer_id' => $customer->id,
            'florist_id' => $florist->id,
        ]);

        $this->assertInstanceOf(Customer::class, $order->customer);
    }
}
