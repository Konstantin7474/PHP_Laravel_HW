<!-- Урок 4. Работа с шаблонами. Шаблонизатор Blade
HW
 -->

HW4

Что нужно сделать:

1. Создайте новый проект Laravel или откройте уже существующий проект, в который хотите добавить шаблоны.

2. Создайте новую ветку вашего репозитория от корневой (main или master).

3. В корневом каталоге проекта создайте подкаталог resources/views. Создайте в нём два шаблона: home.blade.php и contacts.blade.php. Вы заполните эти шаблоны позже.

4. В файле routes/web.php создайте необходимые роуты для навигации по страницам и передачи данных:

— Первый роут — '/', ссылается на корневую страницу проекта. Route::get должен возвращать функцию view. Первым аргументом передайте шаблон home, вторым аргументом — массив данных с ключами name, age, position, address. Значения могут быть произвольными.

— Второй роут — '/contacts'', ссылается на одноимённую страницу с контактами. По аналогии с первым роутом верните из роута функцию view, передайте шаблон contacts и массив с данными — address, post_code, email, phone.

5. В директории views создайте подкаталог layouts, внутри которого поместите шаблон default.blade.php:


6. Как видно из картинки выше, вам необходимо создать переиспользуемые шаблоны для тегов <head>, <footer> и <hеader>. Для этого в папке views создайте подкаталог includes, а в ней, по аналогии уже с созданными страницами, — три соответствующих шаблона с произвольной вёрсткой и вложенностью.

7. Вернёмся к страницам home и contacts:

Внутри директивы @section добавьте базовую HTML-разметку. Для каждой страницы воспользуйтесь директивой @if. Если значение age для страницы home больше 18 лет, выводите простую цифру, в противном случае — предупреждающее сообщение о том, что указанный человек слишком молод. То же самое повторите и со страницей контактов.
Если вместо почты в шаблон приходит пустая строка, выведите сообщение:
«Адрес электронной почты не указан».

8. Сделайте коммит изменений с помощью Git и отправьте push в репозиторий.


HW3

Что нужно сделать:

Создайте базу данных, в ней — новую таблицу. Заполните поля, после чего сделайте выборку данных по указанным полям:

1. Для создания, просмотра и редактирования баз данных MySQL установите программу PhpMyAdmin по [инструкции](http://). Если у вас на компьютере установлен WAMP или XAMPP, то PhpMyAdmin тоже должен быть установлен.

2. Создайте базу данных с любым именем в PhpMyAdmin. Больше в нём ничего делать не нужно, остальное выполните в коде проекта.

3. В папке проекта настройте файл конфигурации для базы данных. Пример:

'mysql' => [
'read' => [
'host' => '192.168.1.1',
],
'write' => [
'host' => '196.168.1.2'
],
'driver' => 'mysql',
'database' => 'database',
'username' => 'root',
'password' => '',
'charset' => 'utf8',
'collation' => 'utf8_unicode_ci',
'prefix' => '',
],

4. Создайте проект Laravel с помощью composer, выполнив команду composer create-project laravel/laravel <имя проекта>.

5. В корне проекта создайте файл .env и укажите параметры подключения к базе данных. После редактирования файла .env выполните команду php artisan config:clear.

6. В папке проекта через командную строку создайте новую модель Employee. Одновременно с этим создайте файл миграции. Для этого в команде создания модели можно использовать флаг -m: php artisan make:model Employee -mfsc. Флаг -mfsc создаст модель, наполнитель, контроллер и файл миграции.

7. С помощью команды php artisan migrate выполните миграции.

8. В файле routes/web.php создайте новый эндпоинт, например test_database:

Route::get('/test_database', function () {
//Код внутри колбэка
});

9. Внутри функции-колбэка напишите код, который создаст новый экземпляр модели Employee, и сохраните его в базу данных с помощью метода save().

10. Запустите локальный сервер Laravel с помощью команды php artisan serve.

11. Перейдите по ссылке <адрес вашего локального сервера>/test_database (по умолчанию http://localhost:8000/test_database).

12. Используйте phpMyAdmin, чтобы убедиться, что в вашей базе данных создались таблицы employees и migrations, а в таблице employees создалась новая строка, соответствующая экземпляру модели Employee.

13. Сделайте коммит своих изменений с помощью Git и отправьте push в репозиторий.

HW2

Что нужно сделать:

Вам предстоит установить фреймворк Laravel и создать контроллер, содержащий экшены для вывода и обработки формы.

1. Установите Laravel с помощью composer, выполнив команду composer create-project laravel/laravel <имя проекта>. В поле <имя проекта> впишите имя вашего проекта. Этому имени будет соответствовать имя папки, в которую вы поместите проект.

2. Создайте контроллер для вывода формы на страницу и её обработки. В командную строку введите команду php artisan make:controller FormProcessor.

3. После выполнения команды убедитесь, что контроллер создан, — соответствующий файл должен появиться в папке app/Http/Controllers.

4. Внутри контроллера опишите метод index: он должен выводить в браузер форму для заполнения.
   — Опишите форму в виде шаблона blade.
   — Внутри формы должны быть поля для ввода имени, фамилии и email пользователя.
   — Форма отправляется методом POST.
   — Параметр action пока оставьте пустым.
   — Не забудьте про CSRF.

5. Внутри файла /routes/web.php опишите новый роут (метод GET), который будет вызывать метод index контроллера FormProcessor по url /userform.

6. Запустите встроенный сервер Laravel командой php artisan serve --port=8080 и убедитесь, что форма выводится по адресу http://localhost:8080/userform.

7. В контроллере FormProcessor создайте метод store для обработки формы. Этот метод должен принимать поля формы и отправлять ответ в виде JSON-объекта, содержащего значения полей формы (имя, фамилия, email).

8. Внутри файла /routes/web.php опишите новый роут (метод POST), который будет вызывать метод store контроллера FormProcessor по url /store_form.

9. Отредактируйте поле action формы в шаблоне и укажите адрес /store_form.

10. Откройте форму в браузере по адресу http://localhost:8080/userform, заполните её и попробуйте отправить на сервер, нажав кнопку Submit. Если всё сделано правильно, вы увидите в браузере объект JSON.

11. Создайте новый шаблон blade для приветствия пользователя (например: «Привет, <имя>!»).

12. Измените метод store контроллера FormProcessor таким образом, чтобы вместо JSON он возвращал шаблон, заполненный данными пользователя.

13. Сделайте коммит своих изменений с помощью git и отправьте push в репозиторий.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
