<?php

namespace App\Models\Stores;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'storeShortName',
        'storeFullName',
        'storeApiUrl',
        'enableApiScrapping',
        'isaVtexStore',
        'imageUrl',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'storeShortName',
        'enableApiScrapping',
        'isaVtexStore',
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
        'enableApiScrapping'    => 'boolean',
        'isaVtexStore'          => 'boolean',
        'created_at'            => 'timestamp',
        'deleted_at'            => 'timestamp',
        'updated_at'            => 'timestamp',
    ];


    /**
     * enableApiScrapping mutator function
     * Changes to boolean according to checbox status
     *
     * @param String $value
     *
     * @return Boolean
     */
    public function setEnableApiScrappingAttribute($value)
    {
        $this->attributes['enableApiScrapping'] = ($value === "on") ? true : false;
    }


    /**
     * isaVtexStore mutator function
     * Changes to boolean according to checbox status
     *
     * @param String $value
     *
     * @return Boolean
     */
    public function setIsaVtexStoreAttribute($value)
    {
        $this->attributes['isaVtexStore'] = ($value === "on") ? true : false;
    }
}
