# Administration - Users


## List all users




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/administration/manage-users/list-users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-users/list-users"
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
 **`api/v1/administration/manage-users/list-users`**



## Returns posts from a given user




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/administration/manage-users/list-user-posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":4,"limit":150038.3276333,"order_by":"desc"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-users/list-user-posts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 4,
    "limit": 150038.3276333,
    "order_by": "desc"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
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
 **`api/v1/administration/manage-users/list-user-posts`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>limit</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>order_by</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>asc</code> or <code>desc</code>.



## Returns comments from a given user




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/administration/manage-users/list-user-comments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":1847.573755,"limit":3150226.274,"order_by":"desc"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-users/list-user-comments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 1847.573755,
    "limit": 3150226.274,
    "order_by": "desc"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
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
 **`api/v1/administration/manage-users/list-user-comments`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>limit</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>order_by</b></code>&nbsp; <small>string</small>     <br>
    The value must be one of <code>asc</code> or <code>desc</code>.



## Update user group




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/administration/manage-users/update-user-group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":279,"group_id":561587904}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-users/update-user-group"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 279,
    "group_id": 561587904
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
 **`api/v1/administration/manage-users/update-user-group`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>group_id</b></code>&nbsp; <small>number</small>     <br>
    




