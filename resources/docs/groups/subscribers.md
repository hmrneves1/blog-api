# Subscribers


## Store




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":1764.906616,"name":"quaerat","email":"albertha.west@example.net"}'

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
    "user_id": 1764.906616,
    "name": "quaerat",
    "email": "albertha.west@example.net"
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



## GET Unsubscribe Token




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers/request-unsubscribe-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"stan60@example.org"}'

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
    "email": "stan60@example.org"
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



## Unsubscribe With Token




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/subscribers/unsubscribe-by-token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"token":"aut","email":"hturner@example.org"}'

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
    "token": "aut",
    "email": "hturner@example.org"
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



## Get All Subscribers




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




