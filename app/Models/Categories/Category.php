<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products\Product;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'similar',
        'searchable',
        'enabled',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        /*'slug',
        'similar',
        'searchable',
        'enabled',*/
        'created_at',
        'deleted_at',
        'updated_at',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'          => 'string',
        'slug'          => 'string',
        'similar'       => 'string',
        'searchable'    => 'boolean',
        'enabled'       => 'boolean',
        'created_at'    => 'timestamp',
        'deleted_at'    => 'timestamp',
        'updated_at'    => 'timestamp',
    ];


    /**
     * searchable mutator function
     * Changes to boolean according to checbox status
     *
     * @param String $value
     *
     * @return Boolean
     */
    public function setSearchableAttribute($value)
    {
        $this->attributes['searchable'] = ($value === "on") ? true : false;
    }


    /**
     * enabled mutator function
     * Changes to boolean according to checbox status
     *
     * @param String $value
     *
     * @return Boolean
     */
    public function setEnabledAttribute($value)
    {
        $this->attributes['enabled'] = ($value === "on") ? true : false;
    }


    /**
     * Category - Products relationship
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'belongsToCategory', 'id');
    }
}
