<img src="https://raw.githubusercontent.com/kaitwalla/mini-mart/main/resources/images/logo.svg" width="60" alt="A stylized drawing of a convenience store">

# Mini-mart

## What is this?

Mini-Mart is a simple key-value store designed to be used by a single person or team who just needs to store some values. The predicating use-case was I needed to just cache some data for some automations and didn't want to spin up an entire CouchDB instance and set up buckets, etc. It's designed to be a **convenient little store** of data, hence the name. It features

- An HTTP API  
- A simple frontend for viewing existing keys
- A simple frontend for managing users
- A simple frontend for managing users' API keys
- Nothing else

## Installation

To install, clone this repo, `cd` into it and create your env file using the example. Run `composer install`. You can run `php artisan key:generate` for an app key for the env file. Run `php artisan migrate` to create your database tables.

With `REGISTER_USERS` set to true, you can visit /register to create a user for yourself. You should then set REGISTER_USERS to false so no one can register a user.

## API routes

```
[POST] /set - requires a "key" and a "value" input. These values will be json_encoded for storage and sent back as a string. It's up to you to decode the value on the other end. If you use a non-unique key, you'll overwrite the existing value.
[GET] /get/{key} - Returns the value of the key/value pair
[DELETE] /delete/{key} - Deletes an existing key/value pair
```

## Values

- Raw strings will be returned as strings  
- Raw booleans will be returned as string equivalents (`"true"` or `"false"`)  
- Everything else should be returned as you stored them, JSON-encoded
