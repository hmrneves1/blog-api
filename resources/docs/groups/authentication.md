# Authentication

Authentication methods.

## Register




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolore","user_name":"repellendus","password":"voluptas","password_confirm":"quia","email":"ghaag@example.org"}'

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
    "name": "dolore",
    "user_name": "repellendus",
    "password": "voluptas",
    "password_confirm": "quia",
    "email": "ghaag@example.org"
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



## Login




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"ayla37@example.com","password":"enim"}'

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
    "email": "ayla37@example.com",
    "password": "enim"
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
    



## Logout user device




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



## Logout all user devices




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/auth/logout-all-devices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/auth/logout-all-devices"
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
 **`api/v1/auth/logout-all-devices`**




