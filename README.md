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


## 예제 ##

```
// 글쓰기
@ 공개여부 : [boolean]
@ 제목 : [string]
@ 내용 : [string] 안내-img 태그로 작성된 이미지는 모두 네이버로 업로드
@ 카테고리 : [null|string] 주의-블로그 카테고리명과 띄어쓰기 까지 일치, 안내-미 입력시 기본 카테고리로 저장
@ 태그 : [null|array|string] 안내-배열 혹은 ',' 로 태그 구분
@ return : [integer] 포스트ID 안내-삭제, 수정할때 필요
NaverBlog::NewBlog('공개여부','제목', '내용', '카테고리', '태그');


// 글수정 (네이버 정책변경으로 글수정 불가, 기존글 삭제 후 새로 작성 로직)
//@ 포스트ID : [integer]
@ 공개여부 : [boolean]
//@ 제목 : [string]
//@ 내용 : [string] 안내-img 태그로 작성된 이미지는 모두 네이버로 업로드
//@ 카테고리 : [null|string] 주의-블로그 카테고리명과 띄어쓰기 까지 일치, 안내-미 입력시 기본 카테고리로 저장
//@ 태그 : [null|array|string] 안내-배열 혹은 ',' 로 태그 구분
//@ return : [integer] 포스트ID 안내-삭제, 수정할때 필요
NaverBlog::EditBlog($postId,'공개여부', '제목', '내용', '카테고리' ,'태그');

// 글삭제
//@ 포스트ID : [integer]
//@ return : [array]
NaverBlog::DelBlog($postId);
```

`TODO : phpunit`

MIT licensed.
