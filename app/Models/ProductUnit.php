<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property float $price
 * @property int|null $discount
 * @property string $color
 * @property string $size
 * @property string $material
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\ProductUnitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductUnit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductUnit extends Model
{
    /** @use HasFactory<\Database\Factories\ProductUnitFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'discount',
        'color',
        'size',
        'material',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
