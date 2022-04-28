<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function show($slug)
    {
        $products = Product::whereStatus(1)->with(['getOneProductAttributes', 'getAllProductReviews', 'getOneProductImages', 'getAllProductVariants.getAllVariantAttributes'])
            ->whereHas('getAllCampaignProducts.getAllCampaignAttributeCampaigns', function ($query) use ($slug) {
                $query->whereSlug($slug);
            })->paginate(8);
        return view('web.products.campaign.index', ['products' => $products]);
    }
}
