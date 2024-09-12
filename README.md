@logo.svg
<svg style="width: 200px; height: 200px;" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--noto" preserveAspectRatio="xMidYMid meet"><path fill="#5c6567" d="M16.21 45.77h6.66v9.91h-6.66z"></path><path fill="#5c6567" d="M57 46.9h6.9v9.16H57z"></path><path fill="#e1e1e1" d="M11.03 73.73h106.39v45.62H11.03z"></path><path d="M6.97 122.72c0 .9.51 1.16 2.18 1.16s109.35-.13 110.25-.13s1.8-.77 1.8-1.93s.3-3.68-.12-4.72c-.42-1.04-3.86-2.35-3.86-2.35H10.7s-2.91 1.46-3.47 2.57s-.26 4.37-.26 5.4z" fill="#9a9a9a"></path><path d="M46.54 74.86s-1.83.59-1.93 1.77c-.1 1.18 0 36.62 0 37.21s.3 1.38 1.52 1.38h36.34c.61 0 1.32-.59 1.32-1.28V76.53c0-.79-1.22-1.58-1.93-1.67c-.7-.09-35.32 0-35.32 0z" fill="#00c1ec"></path><path fill="#178bfd" d="M44.51 95.27H83.9v3.76H44.51z"></path><path fill="#00aa46" d="M44.51 92.23h39.38v3.35H44.51z"></path><path fill="#b0e4ff" d="M62.58 74.76h3.65v40.47h-3.65z"></path><path d="M64.74 59.72L6.02 72.09s.2 2.39 1.76 3.21c.87.46 3.24.32 3.24.32h109.19c.73 0 1.69-.82 1.78-1.87c.09-1.05 0-2.1 0-2.1L64.74 59.72z" fill="#016da7"></path><path d="M6.02 72.1l-.03-4.63L8.5 63.8l113.56 4.16l-.02 4.09S6.23 71.88 6.02 72.1z" fill="#178bfd"></path><path d="M5.99 67.47v-6.72l55.33-3.6l60.79 3.6l-.05 7.2c0 .01-115.99-.4-116.07-.48z" fill="#e1e1e1"></path><path d="M5.99 60.75v-3.92c0-1.35.63-2.7 2.7-2.7h110.64c1.43 0 2.85.72 2.85 1.99s-.07 4.63-.07 4.63H5.99z" fill="#02ab46"></path><path d="M11.1 4.28l56.99-.05c1.36 0 2.47 1.1 2.47 2.47v39.8c0 1.68-1.36 3.03-3.03 3.03H11.47c-1.41 0-2.55-1.13-2.57-2.53L8.75 6.66a2.348 2.348 0 0 1 2.35-2.38z" fill="#ed6d30"></path><path d="M21.99 21.55c.77-.35 2.65-3.43 5-3.25s2.39 3.26.42 5.84c-1.93 2.53-3.73 4.52-6.75 8.61c-3.07 4.17-3.07 8.19-2.53 8.85c.54.66 1.81.54 5 .6c3.19.06 12.53.06 12.95-.3c.42-.36.24-4.7.24-5.24s-.72-1.45-1.57-1.45c-.84 0-7.41.06-7.41.06s2-2.73 4.1-5.72c3.13-4.46 5.29-8.6 4.94-11.62c-.6-5.24-4.04-8.01-10.36-7.23c-5.46.68-8.91 6.56-8.61 7.29c.59 1.41 3.8 3.92 4.58 3.56z" fill="#ffffff"></path><path d="M60.41 28.66c-.04-.54-1.2-.54-2.11-.54c-.9 0-2.05-.06-2.05-.06s-.12-16.26-.12-17.22c0-.96-1.32-1.63-2.89-1.57c-1.45.06-2.11 0-3.25 1.51c-.93 1.22-11.36 17.36-12.23 18.67c-1.14 1.75-2.23 4.88.96 5.24c3.19.36 10.84 0 10.84 0v6.08c0 .6.18 1.08 1.14 1.08h4.64c.6 0 .9-.3.9-1.51v-5.66s2.53.06 3.25 0c.72-.06.9-1.14.9-1.75s.14-2.77.02-4.27zm-14.63-.31l3.73-6.08c-.12 0 0 5.96 0 5.96l-3.73.12z" fill="#ffffff"></path><path fill="#a7d0d6" d="M89.14 79.29h23.03V97H89.14z"></path><path fill="#a7d0d6" d="M16.63 79.53h22.91v17.83H16.63z"></path></svg>
@logo.svg

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
