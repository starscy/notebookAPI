<?php
declare(strict_types=1);

namespace App\Http\Resources;

interface Resource
{
    public function toArray($request): array;
}
