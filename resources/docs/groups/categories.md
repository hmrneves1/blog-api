# Categories

Managing categories.

## Get All Categories


Returns all available categories

> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/categories"
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
        "data": [
            {
                "category_id": 1,
                "name": "PHP",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 2,
                "name": "Laravel",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 3,
                "name": "Life",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 4,
                "name": "Playstation",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 5,
                "name": "MySQL",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 6,
                "name": "Games",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 7,
                "name": "Development",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 8,
                "name": "Ajax",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 9,
                "name": "Laracon",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 10,
                "name": "Twitter",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 11,
                "name": "Xamp",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 12,
                "name": "Github",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 13,
                "name": "Laragon",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 14,
                "name": "Bootstrap",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 15,
                "name": "Templates",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 16,
                "name": "Enduro",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 17,
                "name": "Yamaha",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            },
            {
                "category_id": 18,
                "name": "Motocross",
                "created_at": "2020-07-09T17:38:31.000000Z",
                "updated_at": "2020-07-09T17:38:31.000000Z"
            }
        ]
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/categories`**



## Read


Show data from a specific category

> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/categories/1"
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
            "category_id": 1,
            "name": "PHP",
            "created_at": "2020-07-09T17:38:31.000000Z",
            "updated_at": "2020-07-09T17:38:31.000000Z"
        }
    }
}
```

### Request
<small class="badge badge-green">GET</small>
 **`api/v1/categories/{category_id}`**



## Create


Store a new category into the database

> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/categories" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"mollitia"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/categories"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "mollitia"
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
 **`api/v1/categories`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    



## Update


Updates data from a specific category

> Example request:

```bash
curl -X PUT \
    "https://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"praesentium"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/categories/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "praesentium"
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
 **`api/v1/categories/{comment_id}`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>name</b></code>&nbsp; <small>string</small>     <br>
    



## Delete


Removes a specific category from the database

> Example request:

```bash
curl -X DELETE \
    "https://localhost/api/v1/categories/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/categories/1"
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
 **`api/v1/categories/{comment_id}`**




