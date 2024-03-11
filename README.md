<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Documentation
   hello every one in here we learn how to build clinic app using laravel 10 and Step by step to do it.  
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
   if we neededz inject data you can use factory as
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
6 CRUD Doctor
  * Create a doctor page according to your preferences
  * make model ``php artisan make:model Doctor -m `` flag -m we make file migration. so we will have 2 file
    app/models/doctor.php and database/migration/.....php
  * if you want create fake data doctor you can use factory  `` ctrl+shif+p -> Make Factory``
  * for inject data doctor we need create seeder ``ctrl+shif+p -> Make Seeder``
  * don't forget to call seeder  on Databaseseeder as ``call doctor $this->call(DoctorSeeder::class);``
  * last step run migration  ``php artisan migrate:fresh --seed``
  * make controller, you can do this ``php artisan make:controller DoctorController`` and Create features according to your preferences
 
 # new feature
