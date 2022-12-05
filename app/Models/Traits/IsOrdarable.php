<?php


namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Builder;

trait IsOrdarable
{
    public function scopeOrdered(Builder $builder, $direction = 'asc')
    {
        $builder->orderBy('order', $direction);
    }
}
