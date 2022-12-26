<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductIndexResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Scoping\Scopes\CategoryScope;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['variations.stock'])->withScopes($this->scopes())->paginate(10);

        return ProductIndexResource::collection($products);
    }

    public function show(Product $product)
    {
        $product->load(['variations.stock', 'variations.type', 'variations.product']);
        return new ProductResource($product);
    }

    protected function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
