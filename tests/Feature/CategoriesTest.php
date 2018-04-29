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

    /** @test */
    public function it_lists_the_created_categories()
    {
        $this->withoutExceptionHandling();
        $this->create_a_category();

        $this->get('/api/categories')
            ->assertJson([
                [
                    "name" => $this->cateogry->name,
                    "note" => $this->cateogry->note,
                    "parent_id" => $this->cateogry->parent_id,
                ]
            ]);
    }

    protected function create_a_category()
    {
        return $this->post('/api/categories', $this->cateogry->toArray());
    }
}