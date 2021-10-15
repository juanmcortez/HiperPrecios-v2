<?php

namespace App\Models\Brands;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Products\Product;

class Brand extends Model
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
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'slug',
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
        'created_at'    => 'timestamp',
        'deleted_at'    => 'timestamp',
        'updated_at'    => 'timestamp',
    ];


    /**
     * Brand - Products relationship
     *
     * @return void
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'belongsToBrand', 'id');
    }
}
