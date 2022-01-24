<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Buyer\SearchProductsRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class BuyerProductsController extends Controller
{
    public function index(SearchProductsRequest $request): View
    {
        $categories = Category::all();

        $products = Product::search($request->query('search'))
            ->priceFilter($request->query('priceFrom'), $request->query('priceTo'))
            ->categoryFilter($request->query('category'))
            ->paginate(20);

        return view('buyer.products.index', compact('products', 'categories'));
    }

    public function show(Product $product): View
    {
        return view('buyer.products.show', compact('product'));
    }
}
