<?php

namespace Tests\Unit\Models;

use App\Models\Cat;
use App\Models\Toy;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function catsHaveToys()
    {
        // Setup
        $cat = Cat::factory()->create();
        $toy = Toy::factory()->create([
            'cat_id' => $cat->id,
        ]);

        // Assert
        $this->assertEquals(
            $cat->name,
            $toy->cat->name
        );

        $this->assertInstanceOf(
            Toy::class,
            $cat->toys->first()
        );
    }
}
