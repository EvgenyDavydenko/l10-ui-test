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
4.  Реализация методов взаимодействия с сущностью `Product`. Проверка на Админа. Валидация на создание и редактирование продукта
```
php artisan make:request ProductRequest
```
5.  Сгенерировал миграцию для хранения задач
```
php artisan queue:table
```
Сгенерировал задчу на отпраку почты
```
php artisan make:job SendEmailJob
```
Сгенерировал уведомление о создании продукта
```
php artisan make:notification CreateProduct
```
Запуск обработчика очереди
```
php artisan queue:work
```
