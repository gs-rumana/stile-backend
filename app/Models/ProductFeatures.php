<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property int $feature_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Feature $feature
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\ProductFeaturesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductFeatures whereValue($value)
 * @mixin \Eloquent
 */
class ProductFeatures extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFeaturesFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'feature_id',
        'value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
