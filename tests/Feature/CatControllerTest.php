<?php

namespace Tests\Feature;

use App\Models\Cat;
use App\Models\Toy;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CatControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function catsCanBeListed()
    {
        $cat = Cat::factory()->create();
        $toy = Toy::factory()->create([
            'cat_id' => $cat->id,
        ]);

        $response = $this->get(route('cats.index'));

        $response->assertStatus(200);

        $responseContent = json_decode($response->getContent());

        $this->assertEquals(
            $cat->name,
            $responseContent->cats[0]->name
        );

        $this->assertEquals(
            $toy->name,
            $responseContent->cats[0]->toys[0]->name
        );
    }
}
