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

    public function newBlog(NaverBlogModel $blog)
    {
        $this->naverBlog->setSecret($blog->getSecret());

        $title = $blog->getTitle();
        $context = $blog->getContext();
        $category = $blog->getCategory();
        $tags = $blog->getTags();

        return $this->naverBlog->newBlog($title, $context, $category, $tags);
    }

    public function delBlog(NaverBlogModel $blog)
    {
        return $this->naverBlog->delBlog($blog->getPostId());
    }

    public function editBlog(NaverBlogModel $blog)
    {
        $this->naverBlog->setSecret($blog->getSecret());

        $title = $blog->getTitle();
        $context = $blog->getContext();
        $category = $blog->getCategory();
        $tags = $blog->getTags();
        $postId = $blog->getPostId();

        return $this->naverBlog->editBlog($postId, $title, $context, $category, $tags);
    }
}
