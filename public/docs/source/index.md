---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
## _debugbar/open
> Example request:

```bash
curl -X GET -G "http://localhost/_debugbar/open" 
```

```javascript
const url = new URL("http://localhost/_debugbar/open");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/open`


<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->

<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
## Return Clockwork output

> Example request:

```bash
curl -X GET -G "http://localhost/_debugbar/clockwork/1" 
```

```javascript
const url = new URL("http://localhost/_debugbar/clockwork/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/clockwork/{id}`


<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->

<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
## _debugbar/telescope/{id}
> Example request:

```bash
curl -X GET -G "http://localhost/_debugbar/telescope/1" 
```

```javascript
const url = new URL("http://localhost/_debugbar/telescope/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/telescope/{id}`


<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->

<!-- START_5f8a640000f5db43332951f0d77378c4 -->
## Return the stylesheets for the Debugbar

> Example request:

```bash
curl -X GET -G "http://localhost/_debugbar/assets/stylesheets" 
```

```javascript
const url = new URL("http://localhost/_debugbar/assets/stylesheets");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/stylesheets`


<!-- END_5f8a640000f5db43332951f0d77378c4 -->

<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
## Return the javascript for the Debugbar

> Example request:

```bash
curl -X GET -G "http://localhost/_debugbar/assets/javascript" 
```

```javascript
const url = new URL("http://localhost/_debugbar/assets/javascript");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "message": ""
}
```

### HTTP Request
`GET _debugbar/assets/javascript`


<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->

<!-- START_0973671c4f56e7409202dc85c868d442 -->
## Forget a cache key

> Example request:

```bash
curl -X DELETE "http://localhost/_debugbar/cache/1/1" 
```

```javascript
const url = new URL("http://localhost/_debugbar/cache/1/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE _debugbar/cache/{key}/{tags?}`


<!-- END_0973671c4f56e7409202dc85c868d442 -->

<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## api/user
> Example request:

```bash
curl -X GET -G "http://localhost/api/user" 
```

```javascript
const url = new URL("http://localhost/api/user");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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

### HTTP Request
`GET api/user`


<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->

<!-- START_d29df5fd928092000b93edb0dadbff5d -->
## api/languages
> Example request:

```bash
curl -X GET -G "http://localhost/api/languages" 
```

```javascript
const url = new URL("http://localhost/api/languages");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "code": 200,
    "msg": "success",
    "data": {
        "current_page": 1,
        "data": [],
        "first_page_url": "http:\/\/localhost\/api\/languages?page=1",
        "from": null,
        "last_page": 1,
        "last_page_url": "http:\/\/localhost\/api\/languages?page=1",
        "next_page_url": null,
        "path": "http:\/\/localhost\/api\/languages",
        "per_page": 10,
        "prev_page_url": null,
        "to": null,
        "total": 0
    },
    "page": {
        "current_page": 1,
        "sizes": [
            10,
            50,
            100,
            300
        ],
        "per_page": 10,
        "total": 0
    }
}
```

### HTTP Request
`GET api/languages`


<!-- END_d29df5fd928092000b93edb0dadbff5d -->

<!-- START_251ae2f999ed24b033dc7019479bc321 -->
## api/languages
> Example request:

```bash
curl -X POST "http://localhost/api/languages" 
```

```javascript
const url = new URL("http://localhost/api/languages");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/languages`


<!-- END_251ae2f999ed24b033dc7019479bc321 -->

<!-- START_6a2f6b05e085322db45211385cf4fe6c -->
## api/languages/{language}
> Example request:

```bash
curl -X GET -G "http://localhost/api/languages/1" 
```

```javascript
const url = new URL("http://localhost/api/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET api/languages/{language}`


<!-- END_6a2f6b05e085322db45211385cf4fe6c -->

<!-- START_2acd265efa49099aa7c9bdf4c21ef4ba -->
## api/languages/{language}
> Example request:

```bash
curl -X PUT "http://localhost/api/languages/1" 
```

```javascript
const url = new URL("http://localhost/api/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/languages/{language}`

`PATCH api/languages/{language}`


<!-- END_2acd265efa49099aa7c9bdf4c21ef4ba -->

<!-- START_37f53dfadb6328e8a7f0f72a53d4b17c -->
## api/languages/{language}
> Example request:

```bash
curl -X DELETE "http://localhost/api/languages/1" 
```

```javascript
const url = new URL("http://localhost/api/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/languages/{language}`


<!-- END_37f53dfadb6328e8a7f0f72a53d4b17c -->

<!-- START_0dc72988a5c009237e25cade0afb7ec7 -->
## api/tmpls
> Example request:

```bash
curl -X GET -G "http://localhost/api/tmpls" 
```

```javascript
const url = new URL("http://localhost/api/tmpls");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "code": 200,
    "msg": "success",
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "植健",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "仇文君",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "仇文君",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 2,
                "name": "庄鹰",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "胥志明",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "胥志明",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 3,
                "name": "谈智勇",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "郜林",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "郜林",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 4,
                "name": "白莉",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "阮旭",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "阮旭",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 5,
                "name": "查岩",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "安冬梅",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "安冬梅",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 6,
                "name": "滕斌",
                "sex": 1,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "保华",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "保华",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 7,
                "name": "齐祥",
                "sex": 1,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "瞿桂珍",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "瞿桂珍",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 8,
                "name": "纪志诚",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "成玉梅",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "成玉梅",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 9,
                "name": "谈云",
                "sex": 1,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "陆杨",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "陆杨",
                "deleted_at": null,
                "deleted_by": null
            },
            {
                "id": 10,
                "name": "楚伦",
                "sex": 0,
                "created_at": "2019-08-05 06:16:46",
                "created_by": "井瑜",
                "updated_at": "2019-08-05 06:16:46",
                "updated_by": "井瑜",
                "deleted_at": null,
                "deleted_by": null
            }
        ],
        "first_page_url": "http:\/\/localhost\/api\/tmpls?page=1",
        "from": 1,
        "last_page": 10,
        "last_page_url": "http:\/\/localhost\/api\/tmpls?page=10",
        "next_page_url": "http:\/\/localhost\/api\/tmpls?page=2",
        "path": "http:\/\/localhost\/api\/tmpls",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10,
        "total": 100
    },
    "page": {
        "current_page": 1,
        "sizes": [
            10,
            50,
            100,
            300
        ],
        "per_page": 10,
        "total": 100
    }
}
```

### HTTP Request
`GET api/tmpls`


<!-- END_0dc72988a5c009237e25cade0afb7ec7 -->

<!-- START_2f7ebb723c171906124113761e58c0b9 -->
## api/tmpls
> Example request:

```bash
curl -X POST "http://localhost/api/tmpls" 
```

```javascript
const url = new URL("http://localhost/api/tmpls");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tmpls`


<!-- END_2f7ebb723c171906124113761e58c0b9 -->

<!-- START_0a5947287c9965a48660511a82178028 -->
## api/tmpls/{tmpl}
> Example request:

```bash
curl -X GET -G "http://localhost/api/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/api/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET api/tmpls/{tmpl}`


<!-- END_0a5947287c9965a48660511a82178028 -->

<!-- START_c967e4084aad3339c39094b9e80b5a1c -->
## api/tmpls/{tmpl}
> Example request:

```bash
curl -X PUT "http://localhost/api/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/api/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/tmpls/{tmpl}`

`PATCH api/tmpls/{tmpl}`


<!-- END_c967e4084aad3339c39094b9e80b5a1c -->

<!-- START_5f5e3d189ec0c7431086cd6feb64c443 -->
## api/tmpls/{tmpl}
> Example request:

```bash
curl -X DELETE "http://localhost/api/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/api/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/tmpls/{tmpl}`


<!-- END_5f5e3d189ec0c7431086cd6feb64c443 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET -G "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST "http://localhost/login" 
```

```javascript
const url = new URL("http://localhost/login");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST "http://localhost/logout" 
```

```javascript
const url = new URL("http://localhost/logout");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET -G "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST "http://localhost/register" 
```

```javascript
const url = new URL("http://localhost/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST "http://localhost/password/email" 
```

```javascript
const url = new URL("http://localhost/password/email");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET -G "http://localhost/password/reset/1" 
```

```javascript
const url = new URL("http://localhost/password/reset/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST "http://localhost/password/reset" 
```

```javascript
const url = new URL("http://localhost/password/reset");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## /
> Example request:

```bash
curl -X GET -G "http://localhost/" 
```

```javascript
const url = new URL("http://localhost/");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET -G "http://localhost/home" 
```

```javascript
const url = new URL("http://localhost/home");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_f497f1f7d005ed681f077661b5a3f11b -->
## logs
> Example request:

```bash
curl -X GET -G "http://localhost/logs" 
```

```javascript
const url = new URL("http://localhost/logs");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

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
    "logs": [
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:16:16",
            "text": "array_merge(): Argument #2 is not an array {\"exception\":\"[object] (ErrorException(code: 0): array_merge(): Argument #2 is not an array at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php:137)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 [internal function]: Illuminate\\\\Foundation\\\\Bootstrap\\\\HandleExceptions->handleError(2, 'array_merge(): ...', '\/home\/vagrant\/C...', 137, Array)\n#1 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php(137): array_merge(Array, Object(Illuminate\\\\Http\\\\Response))\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/helpers.php(971): Illuminate\\\\View\\\\Factory->make('tmpl.edit', Object(Illuminate\\\\Http\\\\Response), Array)\n#3 \/home\/vagrant\/Code\/LaravelPlus\/app\/Http\/Controllers\/TmplController.php(284): view('tmpl.edit', Object(Illuminate\\\\Http\\\\Response))\n#4 [internal function]: App\\\\Http\\\\Controllers\\\\TmplController->edit(Object(Illuminate\\\\Http\\\\Request), '1')\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php(54): call_user_func_array(Array, Array)\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php(45): Illuminate\\\\Routing\\\\Controller->callAction('edit', Array)\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(219): Illuminate\\\\Routing\\\\ControllerDispatcher->dispatch(Object(Illuminate\\\\Routing\\\\Route), Object(App\\\\Http\\\\Controllers\\\\TmplController), 'edit')\n#8 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(176): Illuminate\\\\Routing\\\\Route->runController()\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(680): Illuminate\\\\Routing\\\\Route->run()\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Routing\\\\Router->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php(75): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#17 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php(49): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#18 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#19 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#20 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php(56): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#21 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Session\\\\Middleware\\\\StartSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#22 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#23 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php(37): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#24 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#25 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#26 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php(66): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#27 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#28 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#29 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#30 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(682): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#31 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(657): Illuminate\\\\Routing\\\\Router->runRouteWithinStack(Object(Illuminate\\\\Routing\\\\Route), Object(Illuminate\\\\Http\\\\Request))\n#32 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(623): Illuminate\\\\Routing\\\\Router->runRoute(Object(Illuminate\\\\Http\\\\Request), Object(Illuminate\\\\Routing\\\\Route))\n#33 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(612): Illuminate\\\\Routing\\\\Router->dispatchToRoute(Object(Illuminate\\\\Http\\\\Request))\n#34 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(176): Illuminate\\\\Routing\\\\Router->dispatch(Object(Illuminate\\\\Http\\\\Request))\n#35 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Foundation\\\\Http\\\\Kernel->Illuminate\\\\Foundation\\\\Http\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#36 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#37 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Barryvdh\\\\Debugbar\\\\Middleware\\\\InjectDebugbar->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#38 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#39 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#40 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Fideloper\\\\Proxy\\\\TrustProxies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#41 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#42 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#43 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#44 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#45 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#46 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#47 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#48 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#49 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#50 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#51 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(62): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#52 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\CheckForMaintenanceMode->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#53 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#54 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#55 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(151): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#56 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(116): Illuminate\\\\Foundation\\\\Http\\\\Kernel->sendRequestThroughRouter(Object(Illuminate\\\\Http\\\\Request))\n#57 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(285): Illuminate\\\\Foundation\\\\Http\\\\Kernel->handle(Object(Illuminate\\\\Http\\\\Request))\n#58 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(269): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->callLaravelRoute(Object(Illuminate\\\\Http\\\\Request))\n#59 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(38): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->makeApiCall(Object(Illuminate\\\\Http\\\\Request))\n#60 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(49): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->__invoke(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#61 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(68): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver->resolve(Array, Array)\n#62 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php(67): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver::getResponse(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#63 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(232): Mpociot\\\\ApiDoc\\\\Tools\\\\Generator->processRoute(Object(Illuminate\\\\Routing\\\\Route), Array)\n#64 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#65 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#66 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#67 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#68 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#69 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#70 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#71 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#72 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#73 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#74 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#75 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#76 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#77 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#78 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#79 {main}\n\"} \n"
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[660μs] select * from `tmpls` where `tmpls`.`id` = '1' and `tmpls`.`deleted_at` is null limit 1 | GET: tmpls\/1\/edit  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[420μs] select * from `tmpls` where `tmpls`.`id` = '1' and `tmpls`.`deleted_at` is null limit 1 | GET: tmpls\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[330μs] select * from `tmpls` where `tmpls`.`deleted_at` is null limit 10 offset 0 | GET: tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[430μs] select count(*) as aggregate from `tmpls` where `tmpls`.`deleted_at` is null | GET: tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:16:16",
            "text": "array_merge(): Argument #2 is not an array {\"exception\":\"[object] (ErrorException(code: 0): array_merge(): Argument #2 is not an array at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php:137)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 [internal function]: Illuminate\\\\Foundation\\\\Bootstrap\\\\HandleExceptions->handleError(2, 'array_merge(): ...', '\/home\/vagrant\/C...', 137, Array)\n#1 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Factory.php(137): array_merge(Array, Object(Illuminate\\\\Http\\\\Response))\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/helpers.php(971): Illuminate\\\\View\\\\Factory->make('language.edit', Object(Illuminate\\\\Http\\\\Response), Array)\n#3 \/home\/vagrant\/Code\/LaravelPlus\/app\/Http\/Controllers\/LanguageController.php(288): view('language.edit', Object(Illuminate\\\\Http\\\\Response))\n#4 [internal function]: App\\\\Http\\\\Controllers\\\\LanguageController->edit(Object(Illuminate\\\\Http\\\\Request), '1')\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php(54): call_user_func_array(Array, Array)\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php(45): Illuminate\\\\Routing\\\\Controller->callAction('edit', Array)\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(219): Illuminate\\\\Routing\\\\ControllerDispatcher->dispatch(Object(Illuminate\\\\Routing\\\\Route), Object(App\\\\Http\\\\Controllers\\\\LanguageController), 'edit')\n#8 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(176): Illuminate\\\\Routing\\\\Route->runController()\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(680): Illuminate\\\\Routing\\\\Route->run()\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Routing\\\\Router->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php(75): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#17 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php(49): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#18 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#19 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#20 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php(56): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#21 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Session\\\\Middleware\\\\StartSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#22 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#23 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php(37): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#24 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#25 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#26 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php(66): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#27 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#28 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#29 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#30 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(682): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#31 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(657): Illuminate\\\\Routing\\\\Router->runRouteWithinStack(Object(Illuminate\\\\Routing\\\\Route), Object(Illuminate\\\\Http\\\\Request))\n#32 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(623): Illuminate\\\\Routing\\\\Router->runRoute(Object(Illuminate\\\\Http\\\\Request), Object(Illuminate\\\\Routing\\\\Route))\n#33 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(612): Illuminate\\\\Routing\\\\Router->dispatchToRoute(Object(Illuminate\\\\Http\\\\Request))\n#34 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(176): Illuminate\\\\Routing\\\\Router->dispatch(Object(Illuminate\\\\Http\\\\Request))\n#35 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Foundation\\\\Http\\\\Kernel->Illuminate\\\\Foundation\\\\Http\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#36 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#37 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Barryvdh\\\\Debugbar\\\\Middleware\\\\InjectDebugbar->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#38 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#39 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#40 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Fideloper\\\\Proxy\\\\TrustProxies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#41 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#42 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#43 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#44 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#45 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#46 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#47 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#48 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#49 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#50 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#51 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(62): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#52 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\CheckForMaintenanceMode->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#53 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#54 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#55 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(151): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#56 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(116): Illuminate\\\\Foundation\\\\Http\\\\Kernel->sendRequestThroughRouter(Object(Illuminate\\\\Http\\\\Request))\n#57 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(285): Illuminate\\\\Foundation\\\\Http\\\\Kernel->handle(Object(Illuminate\\\\Http\\\\Request))\n#58 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(269): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->callLaravelRoute(Object(Illuminate\\\\Http\\\\Request))\n#59 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(38): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->makeApiCall(Object(Illuminate\\\\Http\\\\Request))\n#60 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(49): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->__invoke(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#61 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(68): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver->resolve(Array, Array)\n#62 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php(67): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver::getResponse(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#63 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(232): Mpociot\\\\ApiDoc\\\\Tools\\\\Generator->processRoute(Object(Illuminate\\\\Routing\\\\Route), Array)\n#64 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#65 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#66 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#67 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#68 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#69 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#70 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#71 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#72 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#73 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#74 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#75 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#76 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#77 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#78 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#79 {main}\n\"} \n"
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[400μs] select * from `languages` where `languages`.`id` = '1' and `languages`.`deleted_at` is null limit 1 | GET: languages\/1\/edit  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[370μs] select * from `languages` where `languages`.`id` = '1' and `languages`.`deleted_at` is null limit 1 | GET: languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[350μs] select count(*) as aggregate from `languages` where `languages`.`deleted_at` is null | GET: languages  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[800μs] select * from `tmpls` where `tmpls`.`deleted_at` is null | GET: export\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:16:16",
            "text": " {\"exception\":\"[object] (Laravel\\\\Socialite\\\\Two\\\\InvalidStateException(code: 0):  at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/socialite\/src\/Two\/AbstractProvider.php:209)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 \/home\/vagrant\/Code\/LaravelPlus\/app\/Http\/Controllers\/Auth\/LoginController.php(53): Laravel\\\\Socialite\\\\Two\\\\AbstractProvider->user()\n#1 [internal function]: App\\\\Http\\\\Controllers\\\\Auth\\\\LoginController->handleProviderCallback()\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php(54): call_user_func_array(Array, Array)\n#3 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php(45): Illuminate\\\\Routing\\\\Controller->callAction('handleProviderC...', Array)\n#4 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(219): Illuminate\\\\Routing\\\\ControllerDispatcher->dispatch(Object(Illuminate\\\\Routing\\\\Route), Object(App\\\\Http\\\\Controllers\\\\Auth\\\\LoginController), 'handleProviderC...')\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(176): Illuminate\\\\Routing\\\\Route->runController()\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(680): Illuminate\\\\Routing\\\\Route->run()\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Routing\\\\Router->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#8 \/home\/vagrant\/Code\/LaravelPlus\/app\/Http\/Middleware\/RedirectIfAuthenticated.php(24): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): App\\\\Http\\\\Middleware\\\\RedirectIfAuthenticated->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Middleware\/SubstituteBindings.php(41): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Routing\\\\Middleware\\\\SubstituteBindings->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/VerifyCsrfToken.php(75): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\VerifyCsrfToken->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#17 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/View\/Middleware\/ShareErrorsFromSession.php(49): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#18 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\View\\\\Middleware\\\\ShareErrorsFromSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#19 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#20 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Session\/Middleware\/StartSession.php(56): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#21 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Session\\\\Middleware\\\\StartSession->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#22 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#23 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/AddQueuedCookiesToResponse.php(37): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#24 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\AddQueuedCookiesToResponse->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#25 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#26 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Cookie\/Middleware\/EncryptCookies.php(66): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#27 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Cookie\\\\Middleware\\\\EncryptCookies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#28 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#29 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#30 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(682): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#31 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(657): Illuminate\\\\Routing\\\\Router->runRouteWithinStack(Object(Illuminate\\\\Routing\\\\Route), Object(Illuminate\\\\Http\\\\Request))\n#32 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(623): Illuminate\\\\Routing\\\\Router->runRoute(Object(Illuminate\\\\Http\\\\Request), Object(Illuminate\\\\Routing\\\\Route))\n#33 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(612): Illuminate\\\\Routing\\\\Router->dispatchToRoute(Object(Illuminate\\\\Http\\\\Request))\n#34 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(176): Illuminate\\\\Routing\\\\Router->dispatch(Object(Illuminate\\\\Http\\\\Request))\n#35 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\\\Foundation\\\\Http\\\\Kernel->Illuminate\\\\Foundation\\\\Http\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#36 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/barryvdh\/laravel-debugbar\/src\/Middleware\/InjectDebugbar.php(58): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#37 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Barryvdh\\\\Debugbar\\\\Middleware\\\\InjectDebugbar->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#38 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#39 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#40 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Fideloper\\\\Proxy\\\\TrustProxies->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#41 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#42 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#43 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#44 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#45 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(21): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#46 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\TransformsRequest->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#47 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#48 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#49 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\ValidatePostSize->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#50 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#51 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(62): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#52 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(163): Illuminate\\\\Foundation\\\\Http\\\\Middleware\\\\CheckForMaintenanceMode->handle(Object(Illuminate\\\\Http\\\\Request), Object(Closure))\n#53 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\\\Pipeline\\\\Pipeline->Illuminate\\\\Pipeline\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#54 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\\\Routing\\\\Pipeline->Illuminate\\\\Routing\\\\{closure}(Object(Illuminate\\\\Http\\\\Request))\n#55 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(151): Illuminate\\\\Pipeline\\\\Pipeline->then(Object(Closure))\n#56 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(116): Illuminate\\\\Foundation\\\\Http\\\\Kernel->sendRequestThroughRouter(Object(Illuminate\\\\Http\\\\Request))\n#57 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(285): Illuminate\\\\Foundation\\\\Http\\\\Kernel->handle(Object(Illuminate\\\\Http\\\\Request))\n#58 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(269): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->callLaravelRoute(Object(Illuminate\\\\Http\\\\Request))\n#59 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(38): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->makeApiCall(Object(Illuminate\\\\Http\\\\Request))\n#60 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(49): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseStrategies\\\\ResponseCallStrategy->__invoke(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#61 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(68): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver->resolve(Array, Array)\n#62 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php(67): Mpociot\\\\ApiDoc\\\\Tools\\\\ResponseResolver::getResponse(Object(Illuminate\\\\Routing\\\\Route), Array, Array)\n#63 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(232): Mpociot\\\\ApiDoc\\\\Tools\\\\Generator->processRoute(Object(Illuminate\\\\Routing\\\\Route), Array)\n#64 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#65 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#66 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#67 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#68 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#69 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#70 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#71 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#72 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#73 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#74 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#75 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#76 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#77 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#78 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#79 {main}\n\"} \n"
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[730μs] select * from `tmpls` where `tmpls`.`id` = '1' and `tmpls`.`deleted_at` is null limit 1 | GET: api\/tmpls\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[510μs] select * from `tmpls` where `tmpls`.`deleted_at` is null limit 10 offset 0 | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[630μs] select count(*) as aggregate from `tmpls` where `tmpls`.`deleted_at` is null | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:16",
            "text": "[730μs] show full columns from tmpls | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:15",
            "text": "[870μs] select * from `languages` where `languages`.`id` = '1' and `languages`.`deleted_at` is null limit 1 | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:16:15",
            "text": "[2.48ms] select count(*) as aggregate from `languages` where `languages`.`deleted_at` is null | GET: api\/languages  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:15:18",
            "text": "Class App\\Http\\Controllers\\StringPresenter does not exist {\"exception\":\"[object] (ReflectionException(code: -1): Class App\\\\Http\\\\Controllers\\\\StringPresenter does not exist at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php:267)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(267): ReflectionClass->__construct('App\\\\\\\\Http\\\\\\\\Contro...')\n#1 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(231): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->isRouteVisibleForDocumentation(Array)\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#3 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#4 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#8 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#17 {main}\n\"} \n"
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[480μs] select * from `tmpls` where `tmpls`.`id` = '1' and `tmpls`.`deleted_at` is null limit 1 | GET: api\/tmpls\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[350μs] select * from `tmpls` where `tmpls`.`deleted_at` is null limit 10 offset 0 | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[560μs] select count(*) as aggregate from `tmpls` where `tmpls`.`deleted_at` is null | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[830μs] show full columns from tmpls | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[600μs] select * from `languages` where `languages`.`id` = '1' and `languages`.`deleted_at` is null limit 1 | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:18",
            "text": "[1.63ms] select count(*) as aggregate from `languages` where `languages`.`deleted_at` is null | GET: api\/languages  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:15:03",
            "text": "Class App\\Http\\Controllers\\StringPresenter does not exist {\"exception\":\"[object] (ReflectionException(code: -1): Class App\\\\Http\\\\Controllers\\\\StringPresenter does not exist at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php:267)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(267): ReflectionClass->__construct('App\\\\\\\\Http\\\\\\\\Contro...')\n#1 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(231): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->isRouteVisibleForDocumentation(Array)\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#3 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#4 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#8 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#17 {main}\n\"} \n"
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:03",
            "text": "[750μs] show full columns from tmpls | GET: api\/tmpls\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:03",
            "text": "[590μs] select * from `tmpls` where `tmpls`.`id` = '1' and `tmpls`.`deleted_at` is null limit 1 | GET: api\/tmpls\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:03",
            "text": "[370μs] select * from `tmpls` where `tmpls`.`deleted_at` is null limit 10 offset 0 | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:03",
            "text": "[550μs] select count(*) as aggregate from `tmpls` where `tmpls`.`deleted_at` is null | GET: api\/tmpls  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:02",
            "text": "[85.27ms] show full columns from tmpls | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:02",
            "text": "[46.74ms] select * from `languages` where `languages`.`id` = '1' and `languages`.`deleted_at` is null limit 1 | GET: api\/languages\/1  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "debug",
            "folder": null,
            "level_class": "info",
            "level_img": "info-circle",
            "date": "2019-08-20 08:15:02",
            "text": "[284.13ms] select count(*) as aggregate from `languages` where `languages`.`deleted_at` is null | GET: api\/languages  ",
            "in_file": null,
            "stack": ""
        },
        {
            "context": "local",
            "level": "error",
            "folder": null,
            "level_class": "danger",
            "level_img": "exclamation-triangle",
            "date": "2019-08-20 08:14:03",
            "text": "Class App\\Http\\Controllers\\testController does not exist {\"exception\":\"[object] (ReflectionException(code: -1): Class App\\\\Http\\\\Controllers\\\\testController does not exist at \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php:267)",
            "in_file": null,
            "stack": "[stacktrace]\n#0 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(267): ReflectionClass->__construct('App\\\\\\\\Http\\\\\\\\Contro...')\n#1 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(231): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->isRouteVisibleForDocumentation(Array)\n#2 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(84): Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->processRoutes(Object(Mpociot\\\\ApiDoc\\\\Tools\\\\Generator), Array)\n#3 [internal function]: Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation->handle()\n#4 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(32): call_user_func_array(Array, Array)\n#5 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(90): Illuminate\\\\Container\\\\BoundMethod::Illuminate\\\\Container\\\\{closure}()\n#6 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(34): Illuminate\\\\Container\\\\BoundMethod::callBoundMethod(Object(Illuminate\\\\Foundation\\\\Application), Array, Object(Closure))\n#7 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(576): Illuminate\\\\Container\\\\BoundMethod::call(Object(Illuminate\\\\Foundation\\\\Application), Array, Array, NULL)\n#8 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\\\Container\\\\Container->call(Array)\n#9 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\\\Console\\\\Command->execute(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#10 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\\\Component\\\\Console\\\\Command\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Illuminate\\\\Console\\\\OutputStyle))\n#11 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(921): Illuminate\\\\Console\\\\Command->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#12 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(273): Symfony\\\\Component\\\\Console\\\\Application->doRunCommand(Object(Mpociot\\\\ApiDoc\\\\Commands\\\\GenerateDocumentation), Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#13 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/symfony\/console\/Application.php(149): Symfony\\\\Component\\\\Console\\\\Application->doRun(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#14 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(90): Symfony\\\\Component\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#15 \/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(133): Illuminate\\\\Console\\\\Application->run(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#16 \/home\/vagrant\/Code\/LaravelPlus\/artisan(37): Illuminate\\\\Foundation\\\\Console\\\\Kernel->handle(Object(Symfony\\\\Component\\\\Console\\\\Input\\\\ArgvInput), Object(Symfony\\\\Component\\\\Console\\\\Output\\\\ConsoleOutput))\n#17 {main}\n\"} \n"
        }
    ],
    "folders": [],
    "current_folder": null,
    "folder_files": [],
    "files": [
        "laravel-2019-08-20.log",
        "laravel-2019-08-15.log"
    ],
    "current_file": "laravel-2019-08-20.log",
    "standardFormat": true
}
```

### HTTP Request
`GET logs`


<!-- END_f497f1f7d005ed681f077661b5a3f11b -->

<!-- START_31a68fedc57a93db458c04b98534014b -->
## login/google
> Example request:

```bash
curl -X GET -G "http://localhost/login/google" 
```

```javascript
const url = new URL("http://localhost/login/google");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET login/google`


<!-- END_31a68fedc57a93db458c04b98534014b -->

<!-- START_12773dfcab6c67cb9b3ca416e95abcaf -->
## Obtain the user information from GitHub.

> Example request:

```bash
curl -X GET -G "http://localhost/login/google/callback" 
```

```javascript
const url = new URL("http://localhost/login/google/callback");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET login/google/callback`


<!-- END_12773dfcab6c67cb9b3ca416e95abcaf -->

<!-- START_a28f1c3ff8cc1b761447adbbf0d75b92 -->
## export/tmpls
> Example request:

```bash
curl -X GET -G "http://localhost/export/tmpls" 
```

```javascript
const url = new URL("http://localhost/export/tmpls");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET export/tmpls`


<!-- END_a28f1c3ff8cc1b761447adbbf0d75b92 -->

<!-- START_6e3a68104e6332202d7aae1a30757fa5 -->
## languages
> Example request:

```bash
curl -X GET -G "http://localhost/languages" 
```

```javascript
const url = new URL("http://localhost/languages");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    "SQLSTATE[42S02]: Base table or view not found: 1146 Table 'homestead.child_table_name' doesn't exist (SQL: show full columns from child_table_name)",
    "\/home\/vagrant\/Code\/LaravelPlus\/vendor\/laravel\/framework\/src\/Illuminate\/Database\/Connection.php",
    664
]
```

### HTTP Request
`GET languages`


<!-- END_6e3a68104e6332202d7aae1a30757fa5 -->

<!-- START_d7fd6c25e1bb206dc555dd50f9a9dbd7 -->
## languages/create
> Example request:

```bash
curl -X GET -G "http://localhost/languages/create" 
```

```javascript
const url = new URL("http://localhost/languages/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET languages/create`


<!-- END_d7fd6c25e1bb206dc555dd50f9a9dbd7 -->

<!-- START_965df74acbd1d6b67795db6f97da52de -->
## languages
> Example request:

```bash
curl -X POST "http://localhost/languages" 
```

```javascript
const url = new URL("http://localhost/languages");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST languages`


<!-- END_965df74acbd1d6b67795db6f97da52de -->

<!-- START_10ef2a1a57e18f637d50e7429893e74d -->
## languages/{language}
> Example request:

```bash
curl -X GET -G "http://localhost/languages/1" 
```

```javascript
const url = new URL("http://localhost/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET languages/{language}`


<!-- END_10ef2a1a57e18f637d50e7429893e74d -->

<!-- START_c77bc0b9b7cc405538edf3bb853ce468 -->
## languages/{language}/edit
> Example request:

```bash
curl -X GET -G "http://localhost/languages/1/edit" 
```

```javascript
const url = new URL("http://localhost/languages/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET languages/{language}/edit`


<!-- END_c77bc0b9b7cc405538edf3bb853ce468 -->

<!-- START_842577b2b8e95876e0fcc9851c4ca685 -->
## languages/{language}
> Example request:

```bash
curl -X PUT "http://localhost/languages/1" 
```

```javascript
const url = new URL("http://localhost/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT languages/{language}`

`PATCH languages/{language}`


<!-- END_842577b2b8e95876e0fcc9851c4ca685 -->

<!-- START_1fed63c0322c001f8e2f6a470627b6d8 -->
## languages/{language}
> Example request:

```bash
curl -X DELETE "http://localhost/languages/1" 
```

```javascript
const url = new URL("http://localhost/languages/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE languages/{language}`


<!-- END_1fed63c0322c001f8e2f6a470627b6d8 -->

<!-- START_5d7e5f8b503726052abc9e52e2e7b53d -->
## tmpls
> Example request:

```bash
curl -X GET -G "http://localhost/tmpls" 
```

```javascript
const url = new URL("http://localhost/tmpls");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET tmpls`


<!-- END_5d7e5f8b503726052abc9e52e2e7b53d -->

<!-- START_9d6f73994840f842b94daa777d47f058 -->
## tmpls/create
> Example request:

```bash
curl -X GET -G "http://localhost/tmpls/create" 
```

```javascript
const url = new URL("http://localhost/tmpls/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET tmpls/create`


<!-- END_9d6f73994840f842b94daa777d47f058 -->

<!-- START_cc2049968a546980cb1a2ce91ead0fee -->
## tmpls
> Example request:

```bash
curl -X POST "http://localhost/tmpls" 
```

```javascript
const url = new URL("http://localhost/tmpls");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST tmpls`


<!-- END_cc2049968a546980cb1a2ce91ead0fee -->

<!-- START_a5e33c31e313dfc5f4205405915769cd -->
## tmpls/{tmpl}
> Example request:

```bash
curl -X GET -G "http://localhost/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
null
```

### HTTP Request
`GET tmpls/{tmpl}`


<!-- END_a5e33c31e313dfc5f4205405915769cd -->

<!-- START_c97360937c1d599c1f443a806c86a287 -->
## tmpls/{tmpl}/edit
> Example request:

```bash
curl -X GET -G "http://localhost/tmpls/1/edit" 
```

```javascript
const url = new URL("http://localhost/tmpls/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET tmpls/{tmpl}/edit`


<!-- END_c97360937c1d599c1f443a806c86a287 -->

<!-- START_f1251c45912a3fa7d014f375e7720d5a -->
## tmpls/{tmpl}
> Example request:

```bash
curl -X PUT "http://localhost/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT tmpls/{tmpl}`

`PATCH tmpls/{tmpl}`


<!-- END_f1251c45912a3fa7d014f375e7720d5a -->

<!-- START_7ca5144139ecda1385f79e547b0d9490 -->
## tmpls/{tmpl}
> Example request:

```bash
curl -X DELETE "http://localhost/tmpls/1" 
```

```javascript
const url = new URL("http://localhost/tmpls/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE tmpls/{tmpl}`


<!-- END_7ca5144139ecda1385f79e547b0d9490 -->


