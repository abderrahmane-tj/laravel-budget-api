<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CategoriesTest extends TestCase {
    use RefreshDatabase;

    /**
     * @var Category $cateogry
     */
    protected $cateogry;

    public function setUp()
    {
        parent::setUp();

        $this->cateogry = factory(Category::class)->make();
    }

    /** @test */
    public function it_returns_an_empty_array_when_none_exists()
    {
        $response = $this->getJson('/api/categories');

        $response
            ->assertStatus(200)
            ->assertJson([]);
    }
}