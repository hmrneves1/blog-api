# Endpoints


## Register method




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"consectetur","user_name":"exercitationem","password":"dicta","password_confirm":"nam","email":"koch.jeffrey@example.com"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consectetur",
    "user_name": "exercitationem",
    "password": "dicta",
    "password_confirm": "nam",
    "email": "koch.jeffrey@example.com"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/register`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>user_name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>password</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>password_confirm</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Login method




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"juliana19@example.net","password":"nulla"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "juliana19@example.net",
    "password": "nulla"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/login`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.

<code><b>password</b></code>&nbsp; <small>string</small>     <br>
    



## Returns all posts with author data




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "response": {
        "success": true,
        "code": 200,
        "message": null,
        "data": {
            "current_page": 1,
            "data": [
                {
                    "post_id": 1,
                    "user_id": 5,
                    "slug": "quidem-et-et-quis-ut-5176",
                    "title": "Quidem et et quis ut. \/5176",
                    "body": "Aliquam sequi dolor rerum deserunt fugiat sit molestiae beatae ut amet rerum mollitia ipsam ut assumenda ab assumenda sit inventore incidunt eaque distinctio ullam accusantium et omnis ea delectus amet quis accusantium tenetur ratione illo possimus voluptas saepe exercitationem est possimus non error dolorem accusantium doloribus ea corrupti voluptatem atque nemo eaque voluptas aspernatur aliquam repellendus ipsa debitis quisquam quis autem asperiores porro quibusdam ut non enim repellendus sit sunt est omnis qui harum est sapiente eum nulla consequuntur autem nobis consequatur magnam ipsum et odit autem magnam perspiciatis aut aut aut rem porro laudantium dignissimos ea numquam itaque temporibus est facere asperiores.",
                    "image": "default.png",
                    "created_at": "2020-07-08T19:13:51.000000Z",
                    "updated_at": "2020-07-08T19:13:51.000000Z",
                    "author": {
                        "user_id": 5,
                        "name": "Liliana Marks V",
                        "user_name": "little.jamaal",
                        "email": "mueller.maria@example.com",
                        "email_verified_at": "2020-07-08T19:13:51.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "rank_id": 1,
                        "created_at": "2020-07-08T19:13:51.000000Z",
                        "updated_at": "2020-07-08T19:13:51.000000Z"
                    }
                },
                {
                    "post_id": 2,
                    "user_id": 2,
                    "slug": "nobis-natus-doloribus-ut-aliquam-quam-ea-cum-rerum-69413",
                    "title": "Nobis natus doloribus ut aliquam quam ea cum rerum. \/69413",
                    "body": "Eos et officia est amet tempora quam reprehenderit repellendus et consequatur sapiente commodi et aliquid sed sapiente qui voluptatem assumenda ut quam alias autem molestias saepe ipsam iste ut facere consequatur dolores et nihil repudiandae molestiae ut id eos voluptatum consequuntur id et est omnis suscipit eum quis quia consequatur maiores qui atque eos rerum consequuntur ducimus quia suscipit et sapiente quidem eum delectus ipsa facere quos voluptatibus ipsa est rem dolor aspernatur illo maiores cumque explicabo aut aliquam molestias sint omnis et earum qui ratione labore consequuntur vero quod.",
                    "image": "default.png",
                    "created_at": "2020-07-08T19:13:51.000000Z",
                    "updated_at": "2020-07-08T19:13:51.000000Z",
                    "author": {
                        "user_id": 2,
                        "name": "Chance Parisian",
                        "user_name": "boehm.harmon",
                        "email": "kiara77@example.com",
                        "email_verified_at": "2020-07-08T19:13:50.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "rank_id": 1,
                        "created_at": "2020-07-08T19:13:51.000000Z",
                        "updated_at": "2020-07-08T19:13:51.000000Z"
                    }
                },
                {
                    "post_id": 3,
                    "user_id": 5,
                    "slug": "dolores-sapiente-dolorem-voluptates-necessitatibus-voluptatum-maiores-aut-21025",
                    "title": "Dolores sapiente dolorem voluptates necessitatibus voluptatum maiores aut. \/21025",
                    "body": "Qui laudantium sit qui aliquid autem sit enim maiores sit illo ipsam a incidunt qui iste nihil quod tempore atque ipsum qui qui repellat dolor saepe odio blanditiis fuga quia quaerat non enim qui repellat perspiciatis esse fugit consequatur est unde dolorum voluptas beatae ratione ex incidunt delectus minima qui aut fugiat ipsa at quas et qui autem eos magni enim doloribus qui et qui et sunt ullam maxime omnis rerum ea et aliquam qui molestias ut et dolor perspiciatis beatae vero qui dolor sunt et dignissimos sunt sed iusto animi aperiam aut voluptates officia ut voluptas unde quia.",
                    "image": "default.png",
                    "created_at": "2020-07-08T19:13:51.000000Z",
                    "updated_at": "2020-07-08T19:13:51.000000Z",
                    "author": {
                        "user_id": 5,
                        "name": "Liliana Marks V",
                        "user_name": "little.jamaal",
                        "email": "mueller.maria@example.com",
                        "email_verified_at": "2020-07-08T19:13:51.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "rank_id": 1,
                        "created_at": "2020-07-08T19:13:51.000000Z",
                        "updated_at": "2020-07-08T19:13:51.000000Z"
                    }
                },
                {
                    "post_id": 4,
                    "user_id": 3,
                    "slug": "eum-recusandae-iste-perspiciatis-fuga-eligendi-omnis-50763",
                    "title": "Eum recusandae iste perspiciatis fuga eligendi omnis. \/50763",
                    "body": "Voluptatum sunt et pariatur fugit impedit voluptates eos sed corporis laborum sint ut illo labore aut minima dolores odio vel ad similique expedita tempora qui rerum ipsum distinctio a enim voluptatem voluptatem error magni ad expedita voluptate saepe et ullam qui est repudiandae illum autem id occaecati eum veniam quasi dignissimos non id non aut sed aspernatur dolores dolore doloribus aliquam nam aspernatur nisi quae et illo architecto fuga suscipit voluptatem voluptas quis error earum.",
                    "image": "default.png",
                    "created_at": "2020-07-08T19:13:51.000000Z",
                    "updated_at": "2020-07-08T19:13:51.000000Z",
                    "author": {
                        "user_id": 3,
                        "name": "Bennie Cole",
                        "user_name": "cortez.stamm",
                        "email": "maximo77@example.net",
                        "email_verified_at": "2020-07-08T19:13:51.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "rank_id": 1,
                        "created_at": "2020-07-08T19:13:51.000000Z",
                        "updated_at": "2020-07-08T19:13:51.000000Z"
                    }
                },
                {
                    "post_id": 5,
                    "user_id": 2,
                    "slug": "eum-nisi-officiis-inventore-14215",
                    "title": "Eum nisi officiis inventore. \/14215",
                    "body": "Sint culpa sunt saepe quis fuga dolor nam ut omnis molestiae ut molestiae quos maxime nemo ex ad debitis eos consequatur corrupti quod assumenda nobis eos similique illum est nihil in eos ipsum ad neque eum repudiandae nulla incidunt ut autem sapiente neque est illum eos ut placeat rerum iusto ut suscipit quo ut dolores a enim excepturi voluptas qui sit aut quas aut illum ea optio sit ut enim veniam ut vitae tenetur a voluptas cumque ipsam aspernatur architecto deleniti voluptate quo aspernatur odit quia blanditiis quia officia vitae dolor et facere est porro et delectus voluptatem nihil ut voluptate nisi voluptatibus qui nulla animi voluptatem sit illum omnis velit cum id doloremque alias veritatis quia ut voluptatum magni dolor officia iste aspernatur doloribus natus laborum ad debitis fugit mollitia numquam eaque maxime molestias repellendus dolorem magni.",
                    "image": "default.png",
                    "created_at": "2020-07-08T19:13:51.000000Z",
                    "updated_at": "2020-07-08T19:13:51.000000Z",
                    "author": {
                        "user_id": 2,
                        "name": "Chance Parisian",
                        "user_name": "boehm.harmon",
                        "email": "kiara77@example.com",
                        "email_verified_at": "2020-07-08T19:13:50.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "rank_id": 1,
                        "created_at": "2020-07-08T19:13:51.000000Z",
                        "updated_at": "2020-07-08T19:13:51.000000Z"
                    }
                }
            ],
            "first_page_url": "http:\/\/localhost\/api\/v1\/posts?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http:\/\/localhost\/api\/v1\/posts?page=2",
            "next_page_url": "http:\/\/localhost\/api\/v1\/posts?page=2",
            "path": "http:\/\/localhost\/api\/v1\/posts",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 10
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/posts`**



## Returns post data, plus author, comments and categories




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "response": {
        "success": false,
        "code": 404,
        "message": null,
        "data": []
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/posts/{slug}`**



## Search posts by keyword




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/search/posts/by-keyword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/search/posts/by-keyword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "response": {
        "success": false,
        "code": 422,
        "message": null,
        "data": []
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/search/posts/by-keyword`**



## Search posts by category id




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/search/posts/by-category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/search/posts/by-category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (422):

```json
{
    "response": {
        "success": false,
        "code": 422,
        "message": null,
        "data": []
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/search/posts/by-category`**



## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":439473.5204,"name":"nemo","email":"novella53@example.org"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/subscribers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 439473.5204,
    "name": "nemo",
    "email": "novella53@example.org"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/subscribers`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>         <i>optional</i>    <br>
    

<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Generate a new token to be used to unsubscribe




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers/request-unsubscribe-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"angel48@example.com"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/subscribers/request-unsubscribe-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "angel48@example.com"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/subscribers/request-unsubscribe-token`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Unsubscribe an user by Email and Token provided in the email




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers/unsubscribe-by-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"temporibus","email":"connor30@example.com"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/subscribers/unsubscribe-by-token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "temporibus",
    "email": "connor30@example.com"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/subscribers/unsubscribe-by-token`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>token</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Logout method




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/auth/logout`**



## Stores a new post into the database




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":195342.755,"title":"atque","body":"sint","image":{}}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 195342.755,
    "title": "atque",
    "body": "sint",
    "image": {}
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/posts`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>title</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>body</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Updates data from a specific post




> Example request:

```bash
curl -X PUT \
    "https://localhost/api/v1/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"corporis","body":"est","image":{}}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "corporis",
    "body": "est",
    "image": {}
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/v1/posts/{post_id}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>title</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>body</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    

<code><b>image</b></code>&nbsp; <small>string</small>         <i>optional</i>    <br>
    



## Removes a specific post from the database




> Example request:

```bash
curl -X DELETE \
    "https://localhost/api/v1/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/posts/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/v1/posts/{post_id}`**



## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/subscribers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/subscribers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/subscribers`**



## Returns all logs from a specific user




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/logs/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/logs/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/logs/search`**



## Stores a new comment




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/comments/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"post_id":3539646.3580202,"comment":"consectetur","parent_id":3628679.8899369}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/comments/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "post_id": 3539646.3580202,
    "comment": "consectetur",
    "parent_id": 3628679.8899369
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-black">POST</small>
 **`api/v1/comments/store`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>post_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>comment</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>parent_id</b></code>&nbsp; <small>number</small>         <i>optional</i>    <br>
    



## Updates data from a specific comment




> Example request:

```bash
curl -X PUT \
    "https://localhost/api/v1/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"comment":"aliquid"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "comment": "aliquid"
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-darkblue">PUT</small>
 **`api/v1/comments/{comment_id}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>comment</b></code>&nbsp; <small>string</small>     <br>
    



## Removes a specific comment from the database




> Example request:

```bash
curl -X DELETE \
    "https://localhost/api/v1/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/comments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### Request
<small class="badge badge-red">DELETE</small>
 **`api/v1/comments/{comment_id}`**




