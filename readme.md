# Wazo

<a href="https://travis-ci.org/cretueusebiu/laravel-vue-spa"><img src="https://travis-ci.org/cretueusebiu/laravel-vue-spa.svg?branch=master" alt="Build Status"></a>


<p align="center">
<!-- <img src="https://i.imgur.com/NHFTsGt.png"> -->
</p>



## Overview
A secure, capacity building platform built with Laravel, Vue (SPA). Version 2.0.0

#### ✨Features (Technologies Used)

- Laravel 6.0 
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Socialite integration
- Bootstrap 4 + Font Awesome 5


#### 🛸Wazo-Engine
The API is organized around REST.

The API is designed to have:
- predictable, resource-oriented URLs
- to use HTTP response codes to indicate API errors
- to use built-in HTTP features, like HTTP authentication and HTTP verbs, which can be understood by off-the-shelf HTTP clients.

> JSON is returned in all responses from the API, including errors.

#### 🚁 Wazo-Web

A frontend baked with Vue 

- Eslint, Javascript Standard codin format used

## 🧩Modules

- [x] Setings module 60%
- [ ] User module
- [ ] Idea module
- [ ] Team module


## 🚀Getting started

#### Installation


- Clone repo
```git clone https://github.com/alphaolomi/wazo```

- Edit `.env` and set your database connection details

```cp .env.example .env```

```bash
php artisan key:generate
# and 
php artisan jwt:secret
php artisan migrate
npm install
```

#### 🔧 Development

```bash
# build and watch
npm run watch

# serve with hot reloading
npm run hot
```


#### 🧪Testing

```bash
vendor/bin/phpunit
```

#### Production

```bash
composer install --no-dev
npm run production
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## 😎Author

- **Alpha Olomi** [hello@alphaolomi.com](hello@alphaolomi.com)

## 📃License

[Apache](http://apachelicense.com) License
