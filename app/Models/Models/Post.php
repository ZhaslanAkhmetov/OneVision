<?php

namespace App\Models\Models;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

abstract class Post
{
    protected string $url = 'https://dummyjson.com/posts?limit=0&skip=';

    private Collection $response;

    protected function sendRequest()
    {
        return Http::get($this->url);
    }

    public function response(): Post
    {
        $this->response = new Collection;

        return $this;
    }
    public function success(): array
    {
        return $this->response->collect()->toArray();
    }

    public function error(int $code = 500, string $message = ''): \Exception
    {
        return new \Exception($message, code: $code);
    }

}
