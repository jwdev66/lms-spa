# Wazo

<a href="https://travis-ci.com/alphaolomi/wazo"><img alt="Build Status" src="https://img.shields.io/travis/alphaolomi/wazo?style=flat-square"></a>
<a href="#"><img src="https://img.shields.io/badge/Maintained%3F-yes-green.svg?style=flat-square" alt="Maintained: yes"></a>
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

Composer and Yarn/NPM are required

#### Installation

- Clone repo
```bash
git clone https://github.com/alphaolomi/wazo

cd wazo

composer install --no-interaction
yarn install
```

- Edit `.env` and set your database connection details

```bash
cp .env.example .env
```

- Genrate keys and migrate tables

```bash
php artisan key:generate
# and 
php artisan jwt:secret
php artisan migrate
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

## 🤝Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.


## 😎Authors

- **Alpha Olomi** [hello@alphaolomi.com](hello@alphaolomi.com)

## 📃License

[Apache](http://apachelicense.com) License
