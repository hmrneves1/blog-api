# Users


## Read




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/users/1"
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
 **`api/v1/users/{user_id}`**



## Update user email




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/users/update-email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":40087.9,"email":"rhartmann@example.org"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/users/update-email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 40087.9,
    "email": "rhartmann@example.org"
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
 **`api/v1/users/update-email`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>email</b></code>&nbsp; <small>string</small>     <br>
    The value must be a valid email address.



## Update user password




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/users/update-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":498.2,"password":"sit","password_confirmation":"earum"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/users/update-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 498.2,
    "password": "sit",
    "password_confirmation": "earum"
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
 **`api/v1/users/update-password`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>password</b></code>&nbsp; <small>string</small>     <br>
    

<code><b>password_confirmation</b></code>&nbsp; <small>string</small>     <br>
    



## Update user avatar




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/users/update-avatar" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"user_id":10578.28699819,"avatar":"distinctio"}'

```

```javascript
const url = new URL(
    "https://localhost/api/v1/users/update-avatar"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "user_id": 10578.28699819,
    "avatar": "distinctio"
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
 **`api/v1/users/update-avatar`**

<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<code><b>user_id</b></code>&nbsp; <small>number</small>     <br>
    

<code><b>avatar</b></code>&nbsp; <small>string</small>     <br>
    




