HW9

Что нужно сделать:

1. Создайте новый проект Laravel или откройте уже существующий.

2. Создайте новую ветку вашего репозитория от корневой (main или master).

3. Создайте миграцию командой php artisan make:migration CreateNewsTable со следующими полями:


4. Создайте модель News.

5. Создайте событие NewsHidden и присвойте полю класса $news параметр $news в конструкторе класса.


6. Создайте слушатель NewsHiddenListener, в котором опишите логику слушателя, используя функцию:
Log::info(‘News ’ . $event->news->id . ‘ hidden’);.

7. Зарегистрируйте событие и слушатель в классе EventServiceProvider.

8. В файле routes/web.php создайте необходимый маршрут ‘/news/create-test’, использующий метод get для создания тестовой новости, и пропишите логику создания тестовой новости.


9. В файле routes/web.php создайте необходимый маршрут, использующий метод get ‘/news/{id}/hide’ для скрытия новости. Измените атрибут is_hidden на значение true. После этой операции вызовите событие NewsHidden с помощью инструкции NewsHidden::dispatch($news);.


10. В файле storage/logs/laravel.log проверьте, сработал ли слушатель, в нём должна появиться строка ‘News hidden 1’, где 1 — это id скрытой новости (может отличаться).

11. Создайте класс-наблюдатель NewsObserver.

12. Зарегистрируйте его в файле App\Providers\EventServiceProvider в функции boot.

13. Опишите логику изменения поля slug новости при вызове события saving в наблюдателе NewsObserver с помощью инструкции.

Эта инструкция использует класс Str, который можно подключить с помощью инструкции в начале файла.


14. Создайте ещё одну новость с помощью маршрута ‘/news/create-test’.

15. Проверьте заполнение поля slug через базу данных. Оно должно выглядеть следующим образом: «test-news-title» (если вы оставили такое же название, как в примере).

16. Сделайте коммит изменений с помощью Git и отправьте push в репозиторий.

HW8

Что нужно сделать:

В этой практической работе вы разработаете сервис логирования, который:
— фиксирует обращения к сайту;
— собирает их в базе данных с возможностью отключения системы логирования;
— отражает в реальном времени HTTP-запросы к приложению.

Создадим новый проект:

composer create-project laravel/laravel log-service

1. Для начала создадим модель логов. Для создания модели необходимо использовать artisan с параметром make:model.
В итоге наша команда будет выглядеть так:

php artisan make:model Log

По умолчанию модель создаётся в ./app/Models/Log.php.
Модель создана, для избежания ошибок запросов SQL необходимо отключить автоматические метки времени.


2. Теперь опишем миграцию для создания нашей таблицы логов:

php artisan make:migration create_logs_table

Напомним, что таблицы миграции создаются по умолчанию в /database/migration/current_date_time_create_logs_table.php.

По умолчанию создаётся файл, содержимое которого выглядит так:


В этом файле нам нужно определить поля, которые будет собирать наш сервис логирования:
— time — время события;
— duration — длительность;
— IP — IP-адрес зашедшего пользователя;
— url — адрес, который запросил пользователь;
— method — HTTP-метод (GET, POST);
— input — передаваемые параметры.

В итоге файл должен приобрести такой вид:


3. Миграция создана, параметры описаны. Теперь создадим таблицу.

Напоминаем, что таблица создаётся также через artisan c параметром migrate php artisan migrate.

4. База данных подготовлена, теперь нужно создать звено (middleware) для обработки HTTP-запросов. Напоминаем, что звенья создаются при помощи команды php artisan make:middleware название модели.

В нашем случае нам нужна команда:
php artisan make:middleware DataLogger

По умолчанию звено (посредник) создастся по пути ./app/Http/Middleware/DataLogger.php.
Теперь необходимо настроить middleware. Открываем Datalogger.php. Добавим использование созданной модели.


Также нужно завершить создание middleware DataLogger, зарегистрировать его в ./app/Http/Kernel.php.


5. Модель создана, посредник HTTP-запросов настроен и зарегистрирован как класс в Kernel.php. Если сейчас запустить Laravel командой php artisan serv, всё будет работать. Логи будут записываться в базу данных.
Но увидеть это можно только в самой базе SQL. Для получения более наглядных результатов необходимо создать в web.php эндпоинт.

Также для этого эндпоинта необходимо создать blade-шаблон: ./resource/view/logs.blade.php

В нём создать запрос к базе SQL и вывод логов в таблицу.



Запускаем приложение, при открытии вашего приложения http://localhost:8000/logs должна открываться таблица с логами обращения к сайту.

HW7

Что нужно сделать:

В этой практической работе вы будете разрабатывать контроллер, который позволит выводить информацию об одном и обо всех пользователях из базы данных, сохранять данные о новом пользователе в БД, а также создавать PDF с информацией о пользователе.
1. Установите новое приложение Laravel и настройте подключение к базе данных. Напомним, что создать новое приложение можно с помощью команды composer:

composer create-project laravel/laravel crud

Добавьте необходимые переменные окружения в ENV-файл корневого каталога приложения.


2. Создайте новую модель Eloquent c помощью команды:

php artisan make:model User -mfsc

Напомним, что флаг -mfsc создаст модель, наполнитель, контроллер и файл миграции.
После опишите схему базы данных в методе up() файла .app/Http/Models/User.php.

После описания схемы таблицы базы данных запустите миграцию.

3. Создайте необходимые роуты в файле web.php. Ваше приложение должно содержать минимум четыре эндпоинта:
— для получения всех пользователей из БД;
— получения одного пользователя через id, переданный в параметрах роута;
— записи нового пользователя в базу данных;
— получения данных о пользователе в виде PDF-файла.


4. Создайте новый blade-шаблон. В blade-шаблоне создайте форму, которая будет отправлять данные о работнике. Важно, чтобы поля HTML-формы были сопоставимы с полями таблицы базы данных. При отправке запроса экземпляр класса request должен содержать данные об имени, фамилии и адресе электронной почты пользователя.
Форма blade-шаблона должна содержать CSRF-токен, поля формы должны быть обязательны к заполнению (используйте атрибут required).

5. В контроллере UserController.php опишите функцию store, которая будет сохранять данные из вашей HTML-формы. Добавьте валидацию.

Дополнительно. Добавьте валидацию на количество символов (максимальное количество символов — 50) для полей Name и Surname. Для почты добавьте валидацию в виде регулярного выражения на соответствие виду example@mail.com.


6. Добавьте соответствующие методы index и get, которые будут возвращать данные обо всех пользователях и об одном пользователе по переданному id. Опционально можете возвращать ответ в формате JSON.

7. Чтобы генерировать PDF-документ, вам понадобится DOMPDF-пакет, который является сторонней библиотекой. Для его установки выполните команду:

composer require barryvdh/laravel-dompdf

— В файле composer.json добавьте строку с указанным пакетом.
— Запустите команду composer update.
— Добавьте необходимый Service Provider и Facade в файл config/app.php.


8. Создайте новый контроллер для работы с PDF:

php artisan make:controller PdfGeneratorController

9. Опишите функцию index, которая будет возвращать новый PDF-файл.


10. Измените роут Route::get(‘/resume’) таким образом, чтобы он принимал id в виде параметра. Обновите функцию «index» так, чтобы PDF формировался на основе данных из таблицы по переданному id.

HW6

Что нужно сделать:

В этой практической работе вы создадите форму по добавлению новой книги в книжный каталог. Форма будет создаваться внутри шаблона. Данные из формы будут записываться в соответствующие поля базы данных с помощью модели Eloquent.

1. Внутри директории resources/view корневого каталога проекта создайте новый блейд-шаблон с именем form.blade.php.
Пример формы:

В примере выше продемонстрирована простая форма для добавления новой записи о книге. В ней указаны поля с названием книги, именем автора, а также жанр, который можно выбрать из списка. Вы также можете добавить произвольные поля, чтобы сделать данные из формы более комплексными и приближенными к реальности.

2. Чтобы защитить данные формы от межсайтовой подделки запроса, добавьте внутрь формы CSRF токен. Напомним, сделать этом можно с помощью директивы @csrf или скрытого поля input:


3. Свяжите данные полей формы с моделью Laravel. Для этого создайте новую модель. Сделать это можно из командной строки с помощью artisan-команды:

Напомним, что флаг -mfsc создаст модель, наполнитель, контроллер и файл миграции.

4. Чтобы данные из формы корректно записывались в соответствующие поля базы данных, опишите схему базы данных в методе up():


Чтобы в базе данных появились соответствующие поля, не забудьте повторно запустить миграции в базе данных, воспользовавшись соответствующей командой artisan.

5. Внутри файла /routes/web.php опишите новый роут (метод GET), который будет вызывать метод index контроллера BookController по url /index. Также добавьте роут с методом POST, который будет вызывать метод store того же контроллера BookController с url** /store**

6. Опишите метод index внутри контроллера BookController. Метод должен возвращать представление формы в браузере.

7. Опишите метод store(). Прежде чем сохранить данные внутри модели, проведите валидацию с помощью метода $request->validate(). Правила для валидации:
— все поля обязательны к заполнению, без пустых строк и пробелов в качестве единственного значения;
— максимальное число символов в имени автора — 100, в названии книги — 255;
— название книги должно быть уникальным значением в моделе Book.


8. Добавьте обработку ошибок при некорректной валидации.


HW5

Что нужно сделать:

В этой практической работе вы будете получать данные из формы и обрабатывать их в контроллере с помощью встроенных методов класса Illuminate\Http\Request.

1. В соответствующих каталогах создайте три файла:
— blade-шаблон для создания пользовательских инпутов;
— EmployeeController для обработки полученных данных из полей формы;
— Route для создания динамического роутинга для отдельного работника и передачи параметра id из адресной строки.

2. В blade-шаблоне создайте форму, которая будет отправлять данные о работнике.

По аналогии с приведённым выше примером создайте ещё несколько полей ввода. Например, поля «Фамилия работника», «Занимаемая должность» и «Адрес проживания». Обратите внимание, что у всех полей формы есть атрибут required=”true”. Это важно для полноты получаемых данных от клиента к серверу.

3. Создайте новый контроллер с названием EmployeeController. Напомним, что создавать контроллер нужно из консоли с помощью команды:


4. Внутри контроллера создайте функцию store, которая будет инициализировать соответствующие переменные и сохранять в них данные из вашей формы:

Добавьте все необходимые переменные в соответствии с вашими полями. Обратите внимание, что мы также создали функцию index, которая просто возвращает необходимый view.

5. Как и в предыдущих занятиях, создайте необходимые роуты в файле web.php:


6. В файле web.php добавьте ещё один роут с внедрением зависимости параметров запроса в виде id:


7. Добавьте соответствующий метод в созданный ранее контроллер:

Добавьте новую переменную id. Поместите в неё id из параметров запроса, обновите данные о пользователе: name, email и так далее.

8. Создайте две новые функции getPath(), getUrl(), в которых необходимо получить и записать в переменную путь и URL запроса. Для этого воспользуйтесь встроенными в класс Request методами $request->path() и $request->url();

Данные методы можно вызывать внутри других методов — update и store, чтобы получать служебную информацию о запросе.

9. В форму ввода добавьте новое текстовое поле textarea, куда необходимо передавать данные в формате JSON, например:


10. Обновите функции store и update. Преобразуйте полученный из запроса JSON в переменную PHP. Для этого воспользуйтесь методом json_decode().

11. Создайте произвольное количество новых php переменных, в которые поместите отдельные поля из пришедших данных в формате JSON. Например:

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

8. Сделайте коммит изменений с помощью Git и отправьте push в репозиторий

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
