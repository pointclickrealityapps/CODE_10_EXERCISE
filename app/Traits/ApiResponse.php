<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{


    protected int $statusCode = Response::HTTP_OK;

    /**
     * Response 200.
     *
     * @param mixed $data
     * @return JsonResponse
     */
    public function okResponse(mixed $data, string $message = ''): JsonResponse
    {
        return $this->success($data, Response::HTTP_OK, $message);
    }

    /**
     * Success Api Response.
     *
     * @param mixed $data
     * @param int $statusCode
     * @return JsonResponse
     */
    public function success(mixed $data, int $statusCode, string $message): JsonResponse
    {
        $data = [
            'code' => Response::$statusTexts[$statusCode],
            'message' => $message,
            'status' => $statusCode,
            'data' => $data,
        ];

        return new JsonResponse($data, $statusCode);
    }

    /**
     * Response 400
     *
     * @param mixed $data
     * @param string $message
     * @return JsonResponse
     */
    public function badResponse(mixed $data, string $message = ''): JsonResponse
    {
        return $this->error($data, Response::HTTP_BAD_REQUEST, $message);
    }

    /**
     * Error Api Response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(mixed $data, int $statusCode, string $message = ''): JsonResponse
    {
        if (!$message) {
            $message = Response::$statusTexts[$statusCode];
        }

        $data = [
            'code' => Response::$statusTexts[$statusCode],
            'message' => $message,
            'status' => $statusCode,
            'data' => $data,
        ];

        return new JsonResponse($data, $statusCode);
    }

}
