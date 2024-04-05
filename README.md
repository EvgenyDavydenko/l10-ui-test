## Тестовое задание для PHP-разработчика (Laravel)

1.  create a new Laravel project via Composer:
```
composer create-project laravel/laravel:^10.0 l10-ui-bth.su
```
2.  install the frontend scaffolding using the `laravel/ui` with `bootstrap`
```
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
```
3.  Создание модели, миграции для таблицы, фабрики для наполнения данными и ресурсного контроллера для сущности `Product`
```
php artisan make:model Product -mf
php artisan migrate --seed
php artisan make:controller ProductController -r
```
