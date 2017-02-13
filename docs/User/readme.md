#User API

## get user list
- get an array of all defined users

### request
```
GET /user
```
###response
####200
```
[
    {
        "id":3,
        "first_name":"Petr",
        "last_name":"Honzuj",
        "login":"phonzu01"
    },
    {
        "id":4,
        "first_name":"Jana",
        "last_name":"Kocourkova",
        "login":"jkocou01"
    }
]
```

## get particular user
### request
```
GET /user/{userId}
```
####200
```
{
  "id": 5,
  "first_name": "Jana",
  "last_name": "Kocourkova",
  "login": "jkocou01"
}
```
####404
```
"User not found"
```

## delete user
### request
```
DELETE /user/{userId}
```
### response
####200
```
"User deleted"
```
####404
```
"User not found"
```
## create user
- login must be in format of six chars and two digits [a-z]{6}[0-9]{2}
- first name and surname is mandatory

###accept
```
application/json
```
###request
```
POST /user
```
####fields:
```
{
    'first_name' : 'name',
    'last_name' : 'surname',
    'login' : 'xxxxxxNN'
}
```
###response
####201
```
{
  "id": "6",
  "msg": "User created"
}
```
####302
```
"Login already exists"
```
####400
```
"Invalid user first name or missing"
"Invalid user last name or missing"
"Invalid login format"
```
## update user
- see [create user](#create-user)

###request
```
PUT /user/{userid}
```
###response
#### 200
```
"User updated"
```
#### 404
```
"User does not exist"
```
