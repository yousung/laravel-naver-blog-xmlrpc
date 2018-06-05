<?php

namespace lovizu\LaravelNaverXmlRpc;

interface NaverBlogModel
{
    // @return string title
    public function getTitle();

    // @return string context
    public function getContext();

    // @return null|array|string tags
    public function getTags();

    // @return string category
    public function getCategory();

    // @return bool secret
    public function getSecret();

    // @return int post id
    public function getPostId();
}