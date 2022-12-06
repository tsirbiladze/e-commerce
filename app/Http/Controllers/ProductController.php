<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductIndexResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return ProductIndexResource::collection($products);
    }
}
