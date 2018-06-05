<?php

namespace lovizu\LaravelNaverXmlRpc\Facades;

use Illuminate\Support\Facades\Facade;

class NaverBlog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'naver-blog';
    }
}
