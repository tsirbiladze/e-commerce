<?php


namespace App\Scoping\Contacts;


use Illuminate\Database\Eloquent\Builder;

interface Scope
{
    public function apply(Builder $builder, $value);
}
