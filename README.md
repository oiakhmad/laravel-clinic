<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Documentation
   hello every one in here we learn how to build clinic app using laravel 10 and step by steb how to do this.  
1. install laravel : composer create-project laravel/laravel laravel-clinic
   if key not generate please run the code ``php artisan key:generate``
2. migration
   firt time we much prepare configurasi database
   - copy and paste .env.example with name .env
   - create database local 
   - doing configuration database  on .env as
   `` 
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_db
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ``
   if we needen inject data you can use factory as
   ``
    \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '6285xxxx',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
   ``
   -- run migration for create table 
   ``php artisan migrate:fresh --seed``
3. import template  
   - [reference template we use ](https://github.com/bahrie127/laravel10-stisla).
   - copas all folder in folder public to forder local project
   - copas all folder resources/views to local project, noted in here we copad template if nedded
   - rederect init  route (routes/web.php) as  return view('dashboard', ['type_menu' => 'dashboard']);
4. fortify
   [Laravel Fortify](https://laravel.com/docs/10.x/fortify#what-is-fortify)
   is a frontend agnostic authentication backend implementation for Laravel. Fortify registers the routes and controllers needed to implement all of Laravel's authentication features, including login, registration, password reset, email verification, and more.
   - install fortify ``composer require laravel/fortify``
   - Next, publish Fortify's resources using the vendor:publish command:
   ``php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"``
   -  add page route on (app/Providers/FortifyServiceProvider.php) in fuction boot()
   ``
       Fortify::loginView(function(){
        return view('pages.auth.login');
       });
   ``
   please redirect view to your page login.
   - you can login use ``route('login')`` on your html and logout ``{{ auth()->user()->name }}``
5. CRUD users
   in here we create feature for create,search, read, update, delete user.
   * prepare page user 
   * make controller, you can do this ``php artisan make:controller UserController``
   * you can add more function as index, update, delete ect. if you chek route already on your app 
     you can the code ``php artisan route:list``
   * to make beautiful pagination please add the code on /app/Profiders/AppServiceProvider.php in functin boot() as
   ``
   public function boot(): void
    {
        //
        Paginator::useBootstrapFour();
    }
   ``
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

