<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function categoryChildrent(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
