<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Resources\Resource;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class BaseController extends Controller
{
    public function sendResponse(Resource|AnonymousResourceCollection $result, string $message, int $code = 200): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    public function sendError(string $error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
