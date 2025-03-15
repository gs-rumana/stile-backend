<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\ProductTagsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductTags whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductTags extends Model
{
    /** @use HasFactory<\Database\Factories\ProductTagsFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id', 'name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
