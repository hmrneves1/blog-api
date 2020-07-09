# Post Comments


## Create




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/comments/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"post_id":280226.11405,"comment":"est","parent_id":547089.22}'

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
    "post_id": 280226.11405,
    "comment": "est",
    "parent_id": 547089.22
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
    



## Update




> Example request:

```bash
curl -X PUT \
    "https://localhost/api/v1/comments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"comment":"eos"}'

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
    "comment": "eos"
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
    



## Delete




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




