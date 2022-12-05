<?php

namespace Tests\Unit\Models\Categories;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_many_children()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $category->children->first());
    }

    public function test_it_can_fetch_only_parents()
    {
        $category = Category::factory()->create();

        $category->children()->save(
            Category::factory()->create()
        );

        $this->assertEquals(1, Category::parents()->count());
    }

    public function test_it_orderable_by_a_numbered_order()
    {
        $category = Category::factory()->create([
            'order' => 2
        ]);

        $anotherCategory = Category::factory()->create([
            'order' => 1
        ]);

        $this->assertEquals($anotherCategory->name, Category::ordered()->first()->name);
    }
}
