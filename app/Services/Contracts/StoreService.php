<?php
declare(strict_types=1);

namespace App\Services\Contracts;

use App\Http\Requests\API\NotebookStoreRequest;
use App\Models\Notebook;

interface StoreService
{
    public function store(array $data): Notebook|string;

    public function update(Notebook $notebook, array $data): Notebook|string;

}
