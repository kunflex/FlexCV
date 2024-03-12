<?php

namespace Spatie\LaravelData\Contracts;

use Closure;
use Spatie\LaravelData\Support\PartialTrees;

interface IncludeableData
{
    public function withPartialTrees(PartialTrees $partialTrees): object;

    public function include(string ...$includes): object;

    public function exclude(string ...$excludes): object;

    public function only(string ...$only): object;

    public function except(string ...$except): object;

    public function includeWhen(string $include, bool|Closure $condition): object;

    public function excludeWhen(string $exclude, bool|Closure $condition): object;

    public function onlyWhen(string $only, bool|Closure $condition): object;

    public function exceptWhen(string $except, bool|Closure $condition): object;

    public function getPartialTrees(): PartialTrees;
}
