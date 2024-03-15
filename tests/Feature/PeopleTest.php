<?php

namespace Tests\Feature;

use App\Models\People;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PeopleTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    public function test_index()
    {
        People::factory()->count(5)->create();
        $response = $this->getJson('/api/peoples');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'surname',
                        'name',
                        'description',
                        'image',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);

        $this->assertCount(5, $response->json('data'));
    }

    /**
         * Test creating a new person.
         *
         * @return void
         */
    public function test_store()
    {
        $data = [
            'surname' => $this->faker->lastName,
                'name' => $this->faker->firstName,
                'description' => $this->faker->text,
                'image' => $this->faker->imageUrl,
            ];
    
        $response = $this->postJson('/api/peoples', $data);
    
        $response->assertStatus(201)
                ->assertJsonStructure([
                    'data' => [
                        'id',
                        'surname',
                        'name',
                        'description',
                        'image',
                        'created_at',
                        'updated_at',
                    ],
                ]);
    
        $this->assertDatabaseHas('people', $data);
    }
        
}
