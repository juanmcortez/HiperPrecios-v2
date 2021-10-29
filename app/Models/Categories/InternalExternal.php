<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Stores\Store;
use App\Models\Categories\Category;

class InternalExternal extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'internalParent',
        'externalParent',
        'externalName',
        'externalSlug',
        'externalCategoryID',
        'internalStoreID',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
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
        'created_at'    => 'timestamp',
        'deleted_at'    => 'timestamp',
        'updated_at'    => 'timestamp',
    ];


    /**
     * Get the store relation
     *
     * @return void
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'id', 'internalStoreID')->withDefault();
    }


    /**
     * External childrens
     *
     * @return void
     */
    public function children()
    {
        return $this->hasMany(self::class, 'externalParent', 'id');
    }


    /**
     * External parent
     *
     * @return void
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'externalParent');
    }


    /**
     * Internal parent
     *
     * @return void
     */
    public function internalParentName()
    {
        return $this->belongsTo(Category::class, 'internalParent', 'id')->withDefault();
    }
}
