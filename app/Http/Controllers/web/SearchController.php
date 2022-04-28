<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function store(SearchStoreRequest $request)
    {
        $products = Product::whereStatus(1)
            ->with([
                'getOneProductAttributes',
                'getAllProductReviews',
                'getOneProductImages',
                'getAllProductVariants.getAllVariantAttributes'
            ])->where(function ($query) use ($request) {
                $query
                    ->whereHas('getOneProductAttributes', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%")
                            ->orWhere('description', 'LIKE', "%{$request->search}%")
                            ->orWhere('sku', 'LIKE', "%{$request->search}%");
                    })
                    ->orWhereHas('getAllProductInformations', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%")
                            ->orWhere('description', 'LIKE', "%{$request->search}%");
                    })
                    ->orWhereHas('getOneProductCategory', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%");
                    })
                    ->orWhereHas('getOneProductBrand', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%");
                    })
                    ->orWhereHas('getAllProductVariants.getAllVariantAttributes', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%");
                    });
            })->paginate(8)->withQueryString();

        return view('web.products.search.index', ['products' => $products]);
    }
    public function auto(Request $request)
    {
        $products = Product::whereStatus(1)
            ->with([
                'getOneProductAttributes',
            ])->where(function ($query) use ($request) {
                $query
                    ->whereHas('getOneProductAttributes', function ($query) use ($request) {
                        $query
                            ->where('title', 'LIKE', "%{$request->search}%");
                    });
            })->take(8)->get();

        return response()->json($products);
    }
}
