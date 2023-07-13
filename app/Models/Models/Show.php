<?php

namespace App\Models\Models;


use Illuminate\Support\Facades\Http;

class Show extends Post
{
    private int $skipPosts = 0;

    private int $limitPost = 30;

    private int $pages;

    public function getPosts()
    {
        $response = $this->requestPosts();
        $result = json_decode($response->body());
        $pages = $result->total / $this->limitPost; // считаем страницы
        $this->pages = ceil($pages); // округляем в большую степень
        $result[] = ['pages' => $this->pages];
        return $response;
    }

    private function requestPosts()
    {
        $this->setDomainName($this->skipPosts);
        return $this->sendRequest();
    }
}
