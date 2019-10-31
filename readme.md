# Wazo [![Software License][ico-license]](LICENSE.md) [![Build Status][ico-travis]][link-travis] [![StyleCI Status][ico-style]][link-styleci] [![Quality Score][ico-code-quality]][link-code-quality] [![Github Fork](https://img.shields.io/github/forks/alphaolomi/wazo?logo=github&style=flat-square)](https://github.com/alphaolomi/wazo)

A secure, capacity building platform built with Laravel, Vue (SPA).

#### ✨Features (Technologies Used)

- Laravel 6.0
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Socialite integration
- Bootstrap 4 + Font Awesome 5
- Includes an REST API
  - predictable, resource-oriented URLs
  - to use HTTP response codes to indicate API errors
  - to use built-in HTTP features, like HTTP authentication and HTTP verbs, which can be understood by off-the-shelf HTTP clients.
  - Consitent JSON Response schema used thourh out the API, including errors.

## 🧩Modules

- [ ] Setings module
- [ ] User module
- [ ] Idea module
- [ ] Team module

## 🚀Getting started

Composer and Yarn/NPM are required

#### Installation

Via Git

- Fork, Clone repo

```bash
git clone https://github.com/alphaolomi/wazo.git

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
yarn run watch

# serve with hot reloading
yarn run hot
```

#### Production

```bash
composer install --no-dev
npm run production
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

```bash
$ vendor/bin/phpunit
```

## Contributing

Pull requests are welcome. Please see [CONTRIBUTING](./.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](./.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email [hello@alphaolomi.com](mailto:hello@alphaolomi.com) instead of using the issue tracker.

## Credits

- **Alpha Olomi** [hello@alphaolomi.com](hello@alphaolomi.com)
- [All Contributors][link-contributors]

## License

The Apache 2 License. Please see [License File](LICENSE) for more information.

[ico-license]: https://img.shields.io/badge/license-Apache2-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/alphaolomi/wazo/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/alphaolomi/wazo.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/alphaolomi/wazo.svg?style=flat-square
[ico-style]: https://github.styleci.io/repos/194079564/shield
[link-travis]: https://travis-ci.org/alphaolomi/wazo
[link-scrutinizer]: https://scrutinizer-ci.com/g/alphaolomi/wazo/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/alphaolomi/wazo
[link-styleci]: https://github.styleci.io/repos/194079564
[link-author]: https://github.com/alphaolomi
[link-contributors]: ../../contributors
