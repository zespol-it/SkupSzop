<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PopularCategoryScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('popularity', '>', 2.0);
    }
} 