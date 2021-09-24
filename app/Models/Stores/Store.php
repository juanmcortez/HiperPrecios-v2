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
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'storeShortName',
        'enableApiScrapping',
        'isaVtexStore',
        'created_at',
        'deleted_at',
        'updated_at',
    ];
}
