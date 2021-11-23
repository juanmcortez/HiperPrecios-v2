<?php

namespace App\Models\Prices;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Stores\Store;
use App\Models\Products\Product;

class Price extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'belongsToProduct',
        'belongsToStore',
        'price',
        'listPrice',
        'priceWithoutDiscount',
        'availableQuantity',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'belongsToProduct',
        'belongsToStore',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'price'                 => 'float',
        'listPrice'             => 'float',
        'priceWithoutDiscount'  => 'float',
        'created_at'            => 'timestamp',
        'updated_at'            => 'timestamp',
        'deleted_at'            => 'timestamp',
    ];


    /**
     * Get the price field mutated
     *
     * @param  string  $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return ($value === null) ? number_format(0, 2) : number_format($value, 2);
    }


    /**
     * Get the listPrice field mutated
     *
     * @param  string  $value
     * @return string
     */
    public function getListPriceAttribute($value)
    {
        return ($value === null) ? number_format(0, 2) : number_format($value, 2);
    }


    /**
     * Get the priceWithoutDiscount field mutated
     *
     * @param  string  $value
     * @return string
     */
    public function getPriceWithoutDiscountAttribute($value)
    {
        return ($value === null) ? number_format(0, 2) : number_format($value, 2);
    }


    /**
     * Price - Product relationship
     *
     * @return void
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'belongsToProduct', 'id')->withDefault();
    }


    /**
     * Price - Store relationship
     *
     * @return void
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'belongsToStore');
    }
}
