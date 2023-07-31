<?php
declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\API\NotebookStoreRequest;
use App\Models\Notebook;
use App\Services\Contracts\StoreService;
use Illuminate\Support\Facades\DB;

class NotebookService implements StoreService
{
    public function store(array $data): Notebook|string
    {
        try {
            Db::beginTransaction();

            $notebook = Notebook::create($data);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $notebook;
    }

    public function update(Notebook $notebook, array $data): Notebook|string
    {
        try {
            Db::beginTransaction();

            $notebook->update($data);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return $notebook;
    }
}
