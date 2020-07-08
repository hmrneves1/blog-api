<?php


namespace App\Traits\Api\v1;


trait ApiResponse
{
    /**
     * Trait for Api responses
     *
     * @param null $success
     * @param null $code
     * @param null $message
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function response(bool $success = null, int $code = null, string $message = null, $data = [])
    {
        return response()
            ->json(
                [
                    'response' => [
                        'success' => $success,
                        'code' => $code,
                        'message' => $message,
                        'data' => $data,
                    ]
                ],
                $code
            )
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ]);
    }

}
