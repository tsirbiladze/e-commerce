<?php

namespace Tests\Unit\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Stock;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_uses_slug_for_the_route_key()
    {
        $product = new Product();

        $this->assertEquals($product->getRouteKeyName(), 'slug');
    }

    public function test_it_has_many_categories()
    {
        $product = Product::factory()->create();

        $product->categories()->save(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $product->categories->first());
    }

    public function test_it_has_many_variations()
    {
        $product = Product::factory()->create();

        $product->variations()->save(
            ProductVariation::factory()->create()
        );

        $this->assertInstanceOf(ProductVariation::class, $product->variations->first());
    }

    public function test_it_returns_money_instance_for_the_price()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(\App\Cart\Money::class, $product->price);
    }

    public function test_it_returns_a_formatted_price()
    {
        $product = Product::factory()->create([
            'price' => 1000
        ]);

        $this->assertEquals($product->formattedPrice, '$10.00');
    }

    public function test_it_can_check_if_its_in_stock()
    {
        $product = Product::factory()->create();

        $product->variations()->save(
            $variation = ProductVariation::factory()->create()
        );

        $variation->stocks()->save(
            Stock::factory()->make()
        );

        $this->assertTrue($product->inStock());
    }

    public function test_it_can_get_the_stock_count()
    {
        $product = Product::factory()->create();

        $product->variations()->save(
            $variation = ProductVariation::factory()->create()
        );

        $variation->stocks()->save(
            Stock::factory()->make([
                'quantity' => $quantity = 5
            ])
        );

        $this->assertEquals($product->stockCount(), $quantity);
    }
}
