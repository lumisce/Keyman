# Keyman Insurance System
### Created with
- [**Laravel 5**](https://laravel.com/)
- [illuminate/html](https://github.com/illuminate/html)
- [laracasts/flash](https://github.com/laracasts/flash)

- [Bootstrap](http://getbootstrap.com/)
- [Select 2](https://select2.github.io/)
- [Font Awesome](https://fortawesome.github.io/Font-Awesome/)

### How to launch the web app
1. install [composer](https://getcomposer.org/)
2. install laravel: `composer global require "laravel/installer"`
3. create a laravel project: `laravel new PROJECT_NAME`
4. open cmd within the project
5. cmd: `composer require "illuminate/html":"5.0.*"`
6. cmd: `composer require laracasts/flash`
7. replace `bindShared()` with `singleton()` in HtmlServiceProvider.php
8. copy the files from the zip to the project directory
9. create database in mysql
10. configure the `.env` file (DB_*)
11. cmd: `php artisan migrate`
12. cmd: `php artisan db:seed`
13. cmd: `php artisan serve`
14. You can now log in with 'admin@keyman.com' and 'password'

### Important folders and files
- app (model files)
- app\Http\Controllers (controller methods)
- app\Http\routes.php (routes)
- database\migrations (database tables)
- public\assets (styles, scripts, fonts)
- resources\views (pages)
