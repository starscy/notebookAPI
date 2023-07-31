<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\API\NotebookStoreRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use App\Services\NotebookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NotebookController extends BaseController
{
    public function __construct(
        protected NotebookService $service
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $data = $request->validate([
            'page' => '',
            'countPages' => ''
        ]);
        $page = $data['page'] ?? config('global.ONE');
        $countPages = $data['countPages'] ?? config('global.TWENTY');;

        $notebooks = Notebook::paginate($countPages, ['*'], 'page', $page);

        return $this->sendResponse(NotebookResource::collection($notebooks), 'Notebooks retrieved successfully.');
    }

    public function store(NotebookStoreRequest $request): JsonResponse
    {
        $response = $this->service->store($request->validated());

        return $response instanceof Notebook ?
            $this->sendResponse(new NotebookResource($response), 'Notebook created successfully', ResponseAlias::HTTP_CREATED) :
            $this->sendError($response);
    }

    public function show(int|string $id): JsonResponse
    {
        $notebook = Notebook::find($id);

        return $notebook instanceof Notebook ?
            $this->sendResponse(new NotebookResource($notebook), 'Notebook retrieved successfully') :
            $this->sendError('Notebook not found');
    }

    public function update(NotebookStoreRequest $request, int|string $id): JsonResponse
    {
        $data = $request->validated();

        $notebook = Notebook::find($id);

        $response = $this->service->update($notebook, $data);

        return $response instanceof Notebook ?
            $this->sendResponse(new NotebookResource($notebook), 'Notebook updated successfully') :
            $this->sendError($response);
    }

    public function destroy(int|string $id): JsonResponse
    {
        $notebook = Notebook::find($id);

        return ($notebook && $notebook->delete()) ?
            $this->sendResponse(new NotebookResource($notebook), 'Notebook deleted successfully') :
            $this->sendError('Could not delete notebook with id ' . $id);
    }

}
