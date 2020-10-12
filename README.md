# 2020년 5월 6일 부로 네이버의 API 서비스 종료로 인하여 해다 라이브러리 사용불가 합니다.
- [관련 도움글] (https://m.blog.naver.com/blogpeople/221893702144)

# PHP Laravel Naver Blog xmlrpc API #

라라벨 네이버 블로그 xmlrpc API

#### Naver Xmlrpc API ####

- [관련 도움글](https://help.naver.com/support/contents/contents.nhn?serviceNo=520&categoryNo=1812)

## 설치 ##

PHP Composer 를 통해 패키지를 설치합니다.

`$ composer require lovizu/laravel-naver-blog-xmlrpc`

config/app.php 파일 설정

```
'providers' => [
    //order Provider
    lovizu\LaravelNaverXmlRpc\LaravelNaverXmlRpcServiceProvider::class,
];

'aliases' => [
    //order Aliases
    'NaverBlog' => \lovizu\LaravelNaverXmlRpc\Facades\NaverBlog::class,
];
```

config 추출 
```
$ php artisan vendor:publish

//or

$ php artisan vendor:publish --provider="lovizu\LaravelNaverXmlRpc\LaravelNaverXmlRpcServiceProvider"
```

NAVER Blog 설정에서 API연결 암호를 얻습니다.


`https://admin.blog.naver.com/[네이버ID]/config/api`

![스크린샷](https://k.kakaocdn.net/dn/cu6laM/btqmshfUFqO/M9wwuaVVzEiusRvmVMyyck/img.jpg)

.env
```
NAVER-BLOG-ID=[네이버 ID]
NAVER-BLOG-PASS=[API 연결 암호]
```

model
```
use lovizu\LaravelNaverXmlRpc\NaverBlogModel

Class Model implements NaverBlogModel
{
    // 필수 메서드 작성
    public function getTitle(){
        // @return string title
    };
    
    public function getContext(){
        // @return string context
    };
    
    public function getTags(){
        // @return null|array|string tags
    };
    
    public function getCategory(){
        // @return string category
    };
    
    public function getSecret(){
        // @return bool secret
    };
    
    public function getPostId(){
        // @return int post id
    };
}
```


## 예제 ##

```
// 글쓰기
//@ 모델 : [NaverBlog]
//@ return : [integer] 포스트ID 안내-삭제, 수정할때 필요
NaverBlog::NewBlog($model);


// 글수정 (네이버 정책변경으로 글수정 불가, 기존글 삭제 후 새로 작성 로직)
//@ 모델 : [NaverBlog]
//@ return : [integer] 포스트ID 안내-삭제, 수정할때 필요
NaverBlog::EditBlog($model);

// 글삭제
//@ 모델 : [NaverBlog]
//@ return : [array]
NaverBlog::DelBlog($model);
```

`TODO : phpunit`

MIT licensed.
