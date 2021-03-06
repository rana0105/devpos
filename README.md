<<<<<<< HEAD
# Roles Permissions Laravel (RPL)
A stater kit with Roles and Permissions implementation on Laravel 5.4

### Install
1. To use it just clone the repo and composer install.
2. Set the database connection 
3. To test the app run `php artisan db:seed`, our [interactive seeder](http://www.qcode.in/advance-interactive-database-seeding-in-laravel/) will take care of everything.

### Add a new Resource
1. Create desired resource by running 
 ```bash
## Create Comment model with migration and resource controller
php artisan make:model Comment -m -c --resource
```
2. Register route for it.
```php
Route::group( ['middleware' => ['auth']], function() {
    ...
    Route::resource('comments', 'CommentController');
});
```

3. Now implement your controllers methods and use the `Authorizable` trait
```php
use App\Authorizable;

class CommentController extends Controller
{
    use Authorizable;
    ...
```

4. Now add the permissions for this new `Comment` model.
```bash
php artisan auth:permission Comment
```

That's it, you have added new resource controller which have full access control by laravel permissions.
 
 ### auth:permission command
 This command can be user to add or remove permission for a given model
 
 ```bash
## add permission
php artisan auth:permission Comment

## remove permissions
php artisan auth:permission Comment --remove
```

### Author
Created by [QCode.in](http://www.qcode.in)

## License

[MIT license](http://opensource.org/licenses/MIT).
=======
# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
* Version
* [Learn Markdown](https://bitbucket.org/tutorials/markdowndemo)

### How do I get set up? ###

* Summary of set up
* Configuration
* Dependencies
* Database configuration
* How to run tests
* Deployment instructions

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact
>>>>>>> c81daab25cc28c376e3f2ceb19188dc9ab27d2a7
