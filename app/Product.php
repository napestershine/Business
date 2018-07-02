<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get all the material of this products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materials() {
        return $this->belongsToMany(Material::class, 'material_products');
    }

    public function materialsName() {
        $m = $this->materials()->pluck('name')->toArray();
        return implode(', ', $m);
    }
}
