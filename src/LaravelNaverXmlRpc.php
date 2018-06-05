<?php

namespace lovizu\LaravelNaverXmlRpc;

use Lovizu\NaverXmlRpc\NaverBlogXml;

class LaravelNaverXmlRpc
{
    private $naverBlog;

    public function __construct($blogId, $blogPass, $secret = true)
    {
        $this->naverBlog = new NaverBlogXml($blogId, $blogPass, $secret);
    }

    public function newBlog($isSecret, $title, $context, $category = null, $tags = [])
    {
        $this->naverBlog->setSecret($isSecret);
        return $this->naverBlog->newBlog($title, $context, $category, $tags);
    }

    public function delBlog($postId)
    {
        return $this->naverBlog->delBlog($postId);
    }

    public function editBlog($postId, $isSecret, $title, $context, $category = null, $tags = [])
    {
        $this->naverBlog->setSecret($isSecret);
        return $this->naverBlog->editBlog($postId, $title, $context, $category, $tags);
    }
}
