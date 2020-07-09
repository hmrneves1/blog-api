# Posts


## Get All Posts




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
                    "post_id": 51,
                    "user_id": 1,
                    "slug": "it-s-a-simple-test-on-app-posts-store",
                    "title": "It's a simple test on App\\Posts::store()",
                    "body": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et sagittis mauris. Phasellus dolor ante.",
                    "image": "5f0760e5ac1b4_20200709_072437.jpg",
                    "created_at": "2020-07-09T18:24:37.000000Z",
                    "updated_at": "2020-07-09T18:24:37.000000Z",
                    "author": {
                        "user_id": 1,
                        "name": "Administrator",
                        "user_name": "admin",
                        "email": "1233@mail.com",
                        "email_verified_at": null,
                        "avatar": "df98b568031a8f164d41b29ca63d73df065f8fda395531f5b1954c1573474452.png",
                        "bio": null,
                        "group_id": 1,
                        "created_at": "2020-07-09T17:38:31.000000Z",
                        "updated_at": "2020-07-09T21:28:01.000000Z"
                    }
                },
                {
                    "post_id": 50,
                    "user_id": 2,
                    "slug": "eligendi-voluptas-ut-aut-aut-molestiae-et-pariatur-75654",
                    "title": "Eligendi voluptas ut aut aut molestiae et pariatur. \/75654",
                    "body": "Dolorem eos ad amet quo explicabo ea eius consequatur et quia id ullam sunt qui voluptatem dolor et nisi saepe ut vero deserunt neque dolorem soluta cum non praesentium quia iste qui quae ratione natus ut nobis id dolore modi asperiores et placeat fuga impedit qui dolores sed nesciunt omnis cum sapiente blanditiis perferendis sit vel quam possimus omnis quia perferendis magni animi vero et magnam beatae illum veritatis atque necessitatibus sint sequi quo nesciunt provident debitis doloribus hic quas similique error cumque officia doloremque dicta aliquid dolores commodi autem quia voluptas adipisci soluta inventore consequuntur.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 2,
                        "name": "Ivah Spencer",
                        "user_name": "candida.rutherford",
                        "email": "queenie.toy@example.com",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 49,
                    "user_id": 7,
                    "slug": "sed-veniam-et-ullam-sed-qui-quas-41015",
                    "title": "Sed veniam et ullam sed qui quas. \/41015",
                    "body": "Minus occaecati quibusdam earum incidunt accusamus cupiditate ex est provident id dolore veritatis itaque unde numquam sapiente veritatis sint consequatur rerum sit autem dolor hic optio maiores laboriosam et nemo laboriosam culpa distinctio provident qui perferendis nihil quis et soluta occaecati odit eaque ut fugit incidunt et voluptates animi autem explicabo voluptas consequatur sint dignissimos omnis quia omnis autem culpa iusto suscipit quia blanditiis non eos pariatur esse dolor sit ut quasi totam temporibus ducimus esse temporibus quia illo perspiciatis dignissimos distinctio porro id sapiente culpa ullam quia.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 7,
                        "name": "Jailyn Herzog",
                        "user_name": "pink.senger",
                        "email": "bernhard.rene@example.net",
                        "email_verified_at": "2020-07-09T17:38:32.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 48,
                    "user_id": 9,
                    "slug": "corporis-nihil-explicabo-earum-corrupti-facere-alias-amet-12990",
                    "title": "Corporis nihil explicabo earum corrupti facere alias amet. \/12990",
                    "body": "Ad non est quos beatae qui excepturi tempora culpa qui rem modi animi quia nostrum hic praesentium est voluptates corporis quibusdam culpa id earum assumenda eius quia qui maiores earum eaque placeat iure veniam soluta ea nulla id quo autem perferendis eum sit qui asperiores ut quae sint iste minus in sunt id qui rerum amet architecto quis ut rerum doloremque omnis et sapiente ut laudantium incidunt suscipit quo id ut qui sit ab sapiente deleniti dolores at et aut corrupti facere animi sed consequatur nihil dolorum facilis laboriosam.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 9,
                        "name": "Antonette Dickens",
                        "user_name": "alia59",
                        "email": "wisoky.billy@example.com",
                        "email_verified_at": "2020-07-09T17:38:32.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 47,
                    "user_id": 4,
                    "slug": "et-similique-repellat-omnis-perferendis-reprehenderit-officiis-voluptas-vero-34907",
                    "title": "Et similique repellat omnis perferendis reprehenderit officiis voluptas vero. \/34907",
                    "body": "Accusantium sed adipisci doloremque natus vel minima qui officiis rerum suscipit suscipit laboriosam nisi ipsum ut voluptas nam odio laudantium autem atque dolorem omnis quia nam quia eum quis qui aliquam incidunt repudiandae libero qui harum non odit delectus eveniet temporibus provident ut nihil ratione consequuntur dolorem inventore voluptas qui necessitatibus minus occaecati consequatur sed nobis accusantium dolorum maiores provident perferendis est placeat quae fugit et libero sed error et esse dolore est rerum consequatur nemo atque asperiores autem in et id expedita aspernatur voluptatem aut blanditiis aperiam et dolor accusantium consequuntur dolorem enim nostrum et accusamus.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 4,
                        "name": "Madyson Schuster",
                        "user_name": "yundt.shane",
                        "email": "slangosh@example.net",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                }
            ],
            "first_page_url": "http:\/\/localhost\/api\/v1\/posts?page=1",
            "from": 1,
            "last_page": 11,
            "last_page_url": "http:\/\/localhost\/api\/v1\/posts?page=11",
            "next_page_url": "http:\/\/localhost\/api\/v1\/posts?page=2",
            "path": "http:\/\/localhost\/api\/v1\/posts",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 51
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/posts`**



## Read




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
    -G "https://localhost/api/v1/search/posts/by-keyword/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/search/posts/by-keyword/1"
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
                    "post_id": 49,
                    "user_id": 7,
                    "slug": "sed-veniam-et-ullam-sed-qui-quas-41015",
                    "title": "Sed veniam et ullam sed qui quas. \/41015",
                    "body": "Minus occaecati quibusdam earum incidunt accusamus cupiditate ex est provident id dolore veritatis itaque unde numquam sapiente veritatis sint consequatur rerum sit autem dolor hic optio maiores laboriosam et nemo laboriosam culpa distinctio provident qui perferendis nihil quis et soluta occaecati odit eaque ut fugit incidunt et voluptates animi autem explicabo voluptas consequatur sint dignissimos omnis quia omnis autem culpa iusto suscipit quia blanditiis non eos pariatur esse dolor sit ut quasi totam temporibus ducimus esse temporibus quia illo perspiciatis dignissimos distinctio porro id sapiente culpa ullam quia.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 7,
                        "name": "Jailyn Herzog",
                        "user_name": "pink.senger",
                        "email": "bernhard.rene@example.net",
                        "email_verified_at": "2020-07-09T17:38:32.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 48,
                    "user_id": 9,
                    "slug": "corporis-nihil-explicabo-earum-corrupti-facere-alias-amet-12990",
                    "title": "Corporis nihil explicabo earum corrupti facere alias amet. \/12990",
                    "body": "Ad non est quos beatae qui excepturi tempora culpa qui rem modi animi quia nostrum hic praesentium est voluptates corporis quibusdam culpa id earum assumenda eius quia qui maiores earum eaque placeat iure veniam soluta ea nulla id quo autem perferendis eum sit qui asperiores ut quae sint iste minus in sunt id qui rerum amet architecto quis ut rerum doloremque omnis et sapiente ut laudantium incidunt suscipit quo id ut qui sit ab sapiente deleniti dolores at et aut corrupti facere animi sed consequatur nihil dolorum facilis laboriosam.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 9,
                        "name": "Antonette Dickens",
                        "user_name": "alia59",
                        "email": "wisoky.billy@example.com",
                        "email_verified_at": "2020-07-09T17:38:32.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 45,
                    "user_id": 3,
                    "slug": "sunt-qui-omnis-tempora-delectus-13598",
                    "title": "Sunt qui omnis tempora delectus. \/13598",
                    "body": "Rerum cumque nobis nobis cum voluptatem sit non officiis tempore non sapiente architecto porro illum perspiciatis debitis repellendus perspiciatis eaque vitae voluptatem illo eveniet eius maxime est occaecati in nostrum voluptas ut cupiditate odio optio in dicta qui pariatur tenetur ut quod dolores nulla omnis et id magnam saepe sed libero et excepturi minima a quidem ut magnam quia qui aliquam et modi odio non est repellat ad consectetur qui beatae voluptatem repellat quisquam quo ea autem et molestiae reprehenderit ea eos et voluptatem ut est reiciendis omnis neque autem eligendi voluptas temporibus possimus aut perferendis voluptatem libero non aspernatur voluptatem consectetur debitis corporis distinctio sed mollitia consequuntur dolor nihil est aut ut necessitatibus eos quam amet assumenda porro maiores sunt qui vitae non optio quia earum dolorem dignissimos delectus et perferendis pariatur est.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 3,
                        "name": "Rae Feil",
                        "user_name": "etha.lebsack",
                        "email": "litzy.borer@example.org",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                },
                {
                    "post_id": 42,
                    "user_id": 1,
                    "slug": "magnam-beatae-veniam-dolorem-et-aut-architecto-labore-70510",
                    "title": "Magnam beatae veniam dolorem et aut architecto labore. \/70510",
                    "body": "Omnis harum molestias quas fugit qui explicabo qui fugit fugiat nisi suscipit quasi unde deserunt a vitae et veniam est nobis officiis facere architecto officiis amet quo quis sed illo ipsum unde non veritatis maiores incidunt sapiente exercitationem aut nisi rerum et nulla in reprehenderit alias tenetur atque quam temporibus voluptates voluptate corporis deserunt magnam id deserunt ad et suscipit ut consequuntur saepe fugiat vero quia exercitationem eum doloremque laborum aut nisi aliquid rerum eaque qui rerum repellat aperiam beatae quisquam minus ratione sed assumenda sint reiciendis.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 1,
                        "name": "Administrator",
                        "user_name": "admin",
                        "email": "1233@mail.com",
                        "email_verified_at": null,
                        "avatar": "df98b568031a8f164d41b29ca63d73df065f8fda395531f5b1954c1573474452.png",
                        "bio": null,
                        "group_id": 1,
                        "created_at": "2020-07-09T17:38:31.000000Z",
                        "updated_at": "2020-07-09T21:28:01.000000Z"
                    }
                },
                {
                    "post_id": 41,
                    "user_id": 5,
                    "slug": "repellendus-qui-officiis-optio-rerum-consequuntur-65216",
                    "title": "Repellendus qui officiis optio rerum consequuntur. \/65216",
                    "body": "Vel magni cum sapiente impedit earum nihil quia ea qui exercitationem non et dolores eveniet ut sed necessitatibus quo delectus debitis itaque maxime dolore sed voluptatibus vel voluptatem eum eos consequatur sit omnis et nihil totam dignissimos aut quia aut assumenda ullam et ea voluptas saepe omnis est impedit provident sit temporibus error recusandae pariatur dolores suscipit repellendus quia eligendi rem tempora quisquam delectus aut fugiat voluptate voluptas voluptate beatae.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 5,
                        "name": "Miss Annalise Mosciski",
                        "user_name": "lmarquardt",
                        "email": "damion59@example.net",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    }
                }
            ],
            "first_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-keyword\/1?page=1",
            "from": 1,
            "last_page": 5,
            "last_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-keyword\/1?page=5",
            "next_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-keyword\/1?page=2",
            "path": "http:\/\/localhost\/api\/v1\/search\/posts\/by-keyword\/1",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 22
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/search/posts/by-keyword/{keyword}`**



## Search posts by category id




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/search/posts/by-category/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/search/posts/by-category/1"
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
                    "post_id": 50,
                    "user_id": 2,
                    "slug": "eligendi-voluptas-ut-aut-aut-molestiae-et-pariatur-75654",
                    "title": "Eligendi voluptas ut aut aut molestiae et pariatur. \/75654",
                    "body": "Dolorem eos ad amet quo explicabo ea eius consequatur et quia id ullam sunt qui voluptatem dolor et nisi saepe ut vero deserunt neque dolorem soluta cum non praesentium quia iste qui quae ratione natus ut nobis id dolore modi asperiores et placeat fuga impedit qui dolores sed nesciunt omnis cum sapiente blanditiis perferendis sit vel quam possimus omnis quia perferendis magni animi vero et magnam beatae illum veritatis atque necessitatibus sint sequi quo nesciunt provident debitis doloribus hic quas similique error cumque officia doloremque dicta aliquid dolores commodi autem quia voluptas adipisci soluta inventore consequuntur.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 2,
                        "name": "Ivah Spencer",
                        "user_name": "candida.rutherford",
                        "email": "queenie.toy@example.com",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    },
                    "pivot": {
                        "category_id": 1,
                        "post_id": 50
                    }
                },
                {
                    "post_id": 49,
                    "user_id": 7,
                    "slug": "sed-veniam-et-ullam-sed-qui-quas-41015",
                    "title": "Sed veniam et ullam sed qui quas. \/41015",
                    "body": "Minus occaecati quibusdam earum incidunt accusamus cupiditate ex est provident id dolore veritatis itaque unde numquam sapiente veritatis sint consequatur rerum sit autem dolor hic optio maiores laboriosam et nemo laboriosam culpa distinctio provident qui perferendis nihil quis et soluta occaecati odit eaque ut fugit incidunt et voluptates animi autem explicabo voluptas consequatur sint dignissimos omnis quia omnis autem culpa iusto suscipit quia blanditiis non eos pariatur esse dolor sit ut quasi totam temporibus ducimus esse temporibus quia illo perspiciatis dignissimos distinctio porro id sapiente culpa ullam quia.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 7,
                        "name": "Jailyn Herzog",
                        "user_name": "pink.senger",
                        "email": "bernhard.rene@example.net",
                        "email_verified_at": "2020-07-09T17:38:32.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    },
                    "pivot": {
                        "category_id": 1,
                        "post_id": 49
                    }
                },
                {
                    "post_id": 47,
                    "user_id": 4,
                    "slug": "et-similique-repellat-omnis-perferendis-reprehenderit-officiis-voluptas-vero-34907",
                    "title": "Et similique repellat omnis perferendis reprehenderit officiis voluptas vero. \/34907",
                    "body": "Accusantium sed adipisci doloremque natus vel minima qui officiis rerum suscipit suscipit laboriosam nisi ipsum ut voluptas nam odio laudantium autem atque dolorem omnis quia nam quia eum quis qui aliquam incidunt repudiandae libero qui harum non odit delectus eveniet temporibus provident ut nihil ratione consequuntur dolorem inventore voluptas qui necessitatibus minus occaecati consequatur sed nobis accusantium dolorum maiores provident perferendis est placeat quae fugit et libero sed error et esse dolore est rerum consequatur nemo atque asperiores autem in et id expedita aspernatur voluptatem aut blanditiis aperiam et dolor accusantium consequuntur dolorem enim nostrum et accusamus.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 4,
                        "name": "Madyson Schuster",
                        "user_name": "yundt.shane",
                        "email": "slangosh@example.net",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    },
                    "pivot": {
                        "category_id": 1,
                        "post_id": 47
                    }
                },
                {
                    "post_id": 46,
                    "user_id": 4,
                    "slug": "saepe-doloribus-et-deserunt-aut-velit-74457",
                    "title": "Saepe doloribus et deserunt aut velit. \/74457",
                    "body": "Laboriosam est officia eum molestiae atque veritatis possimus voluptas non tenetur impedit perferendis quibusdam qui velit ullam officia sunt nihil reprehenderit repellat doloremque et earum sunt et eum ipsum id animi voluptates qui voluptate similique sit facilis recusandae sit ab non sint atque qui aut voluptatem id molestiae nostrum ea asperiores omnis sapiente minus molestias qui beatae consectetur adipisci rerum sed.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 4,
                        "name": "Madyson Schuster",
                        "user_name": "yundt.shane",
                        "email": "slangosh@example.net",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    },
                    "pivot": {
                        "category_id": 1,
                        "post_id": 46
                    }
                },
                {
                    "post_id": 43,
                    "user_id": 5,
                    "slug": "sunt-eum-enim-delectus-quisquam-pariatur-labore-magni-7882",
                    "title": "Sunt eum enim delectus quisquam pariatur labore magni. \/7882",
                    "body": "Ut molestiae similique impedit laboriosam laudantium impedit qui perferendis dolores dolor libero illum non est autem quam velit sunt voluptatem est illo dolorem voluptatem ut veniam et est facere consectetur illum repellendus sed sint enim quo at qui sapiente vel necessitatibus maiores magnam est ea commodi nostrum ut officiis qui et quisquam ab necessitatibus accusantium enim quis quia et in pariatur consequatur molestiae tempora.",
                    "image": "default.png",
                    "created_at": "2020-07-09T17:38:32.000000Z",
                    "updated_at": "2020-07-09T17:38:32.000000Z",
                    "author": {
                        "user_id": 5,
                        "name": "Miss Annalise Mosciski",
                        "user_name": "lmarquardt",
                        "email": "damion59@example.net",
                        "email_verified_at": "2020-07-09T17:38:31.000000Z",
                        "avatar": "default.png",
                        "bio": null,
                        "group_id": 2,
                        "created_at": "2020-07-09T17:38:32.000000Z",
                        "updated_at": "2020-07-09T17:38:32.000000Z"
                    },
                    "pivot": {
                        "category_id": 1,
                        "post_id": 43
                    }
                }
            ],
            "first_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-category\/1?page=1",
            "from": 1,
            "last_page": 5,
            "last_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-category\/1?page=5",
            "next_page_url": "http:\/\/localhost\/api\/v1\/search\/posts\/by-category\/1?page=2",
            "path": "http:\/\/localhost\/api\/v1\/search\/posts\/by-category\/1",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 25
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/search/posts/by-category/{category_id}`**



## Create




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":4542510.6,"title":"velit","body":"possimus","image":{}}'

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
    "user_id": 4542510.6,
    "title": "velit",
    "body": "possimus",
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
    



## Update




> Example request:

```bash
curl -X PUT \
    "https://localhost/api/v1/posts/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"suscipit","body":"modi","image":{}}'

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
    "title": "suscipit",
    "body": "modi",
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
    



## Delete




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



## Get All Posts




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/administration/manage-posts/posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-posts/posts"
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
 **`api/v1/administration/manage-posts/posts`**




