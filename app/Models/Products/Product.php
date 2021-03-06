<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use App\Models\Prices\Price;
use App\Models\Categories\Category;
use App\Models\Brands\Brand;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'metaName',
        'metaTitle',
        'metaDescription',
        'nameShort',
        'nameLong',
        'ean',
        'measuramentMultiplier',
        'measuramentUnit',
        'belongsToCategory',
        'belongsToBrand',
        'imageUrl'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'metaName',
        'metaTitle',
        'metaDescription',
        'belongsToCategory',
        'belongsToBrand',
        'created_at',
        'deleted_at',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at'            => 'timestamp',
        'deleted_at'            => 'timestamp',
        'updated_at'            => 'timestamp',
    ];


    /**
     * Get the updated_at field mutated
     *
     * @param  string  $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return ($value === null) ? null : ucfirst(Carbon::parse($value)->format(config('app.date_format')));
    }


    /**
     * Product - Category relationship
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'belongsToCategory', 'id')->withDefault();
    }


    /**
     * Product - Brand relationship
     *
     * @return void
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'belongsToBrand', 'id')->withDefault();
    }


    /**
     * Product - Price relationship
     *
     * @return void
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'belongsToProduct', 'id')
            ->with('store')
            ->orderBy('price')
            ->orderBy('listPrice');
    }
}
