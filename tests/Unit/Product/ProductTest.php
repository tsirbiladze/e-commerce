<?php

namespace Tests\Unit\Product;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

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
}
