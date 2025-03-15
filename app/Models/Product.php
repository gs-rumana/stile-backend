<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $category_id
 * @property int $sub_category_id
 * @property string $name
 * @property string $slug
 * @property string|null $image
 * @property array<array-key, mixed>|null $gallery
 * @property string|null $description
 * @property float $max_price
 * @property float $min_price
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductFeatures> $features
 * @property-read int|null $features_count
 * @property-read mixed $gallery_url
 * @property-read mixed $image_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductUnit> $productUnits
 * @property-read int|null $product_units_count
 * @property-read \App\Models\SubCategory $subCategory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductTags> $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMaxPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereMinPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSubCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'max_price',
        'min_price',
        'image',
        'category_id',
        'sub_category_id',
        'status',
        'slug',
        'gallery',
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    protected $appends = ['image_url', 'gallery_url'];

    protected $with = ['productUnits'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getGalleryUrlAttribute()
    {
        foreach ($this->gallery as $key => $image) {
            $this->gallery[$key] = asset('storage/' . $image);
        }

        return $this->gallery;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function productUnits()
    {
        return $this->hasMany(ProductUnit::class);
    }

    public function tags()
    {
        return $this->hasMany(ProductTags::class);
    }

    public function features()
    {
        return $this->hasMany(ProductFeatures::class);
    }

    public function reviews()
    {
        $this->morphMany(Review::class, 'reviewable');
    }

    // On delete
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $product->productUnits()->delete();
        });
    }
}
