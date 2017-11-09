#Инструкция по запуску
1. `composer install`
2. `npm install`
3. `php artisan migrate`
4. `npm run production`

* Версия Node, на которой собирались скрипты - 7.5.0
* Версия PHP - 7.0
* Версия Bootstrap - 4
* Версия Laravel - 5.5

Для каждого пользователя показывается
количество его попыток авторизации.
Количество попыток по всем пользователям можно
получить следующим запросом.

```
SELECT login, count(*)
FROM log
GROUP BY login;
```