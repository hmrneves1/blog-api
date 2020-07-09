# Administration - Pending Posts


## List all pending posts




> Example request:

```bash
curl -X GET \
    -G "https://localhost/api/v1/administration/manage-posts/pending-posts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-posts/pending-posts"
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
 **`api/v1/administration/manage-posts/pending-posts`**



## Approve a pending post




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/administration/manage-posts/pending-posts/approve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-posts/pending-posts/approve"
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
 **`api/v1/administration/manage-posts/pending-posts/approve`**



## Delete a pending posts




> Example request:

```bash
curl -X POST \
    "https://localhost/api/v1/administration/manage-posts/pending-posts/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://localhost/api/v1/administration/manage-posts/pending-posts/delete"
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
 **`api/v1/administration/manage-posts/pending-posts/delete`**




