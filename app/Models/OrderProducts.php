<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $product_unit_id
 * @property int $quantity
 * @property float $price
 * @property float $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\ProductUnit $productUnit
 * @method static \Database\Factories\OrderProductsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereProductUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OrderProducts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OrderProducts extends Model
{
    /** @use HasFactory<\Database\Factories\OrderProductsFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_unit_id',
        'quantity',
        'price',
        'total',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productUnit()
    {
        return $this->belongsTo(ProductUnit::class);
    }
}
