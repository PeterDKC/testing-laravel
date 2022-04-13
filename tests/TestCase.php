<?php

namespace Tests;

use Illuminate\Support\Str;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, LazilyRefreshDatabase;

    protected function outputQuery(Builder $query)
    {
        return Str::replaceArray(
            '?',
            $query->getBindings(),
            $query->toSql()
        );
    }
}
