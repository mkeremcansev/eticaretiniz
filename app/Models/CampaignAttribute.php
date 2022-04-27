<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['campaign_id', 'product_id', 'hash'];
    public function getAllCampaignAttributeCampaigns()
    {
        return $this->hasMany(Campaign::class, 'id', 'campaign_id');
    }
    public function getOneCampaignAttributeProducts()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
