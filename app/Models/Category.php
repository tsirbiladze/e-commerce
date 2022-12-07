<?php

namespace App\Models;

use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrdarable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, IsOrdarable, HasChildren;

    protected $fillable = [
        'name',
        'order',
        'slug'
    ];

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
