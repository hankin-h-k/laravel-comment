# laravel-comment

###  部署步骤

```
$ composer require hankin/laravel-comment

```

If you don't use auto-discovery, or using Laravel version < 5.5 Add service provider to your app.php file

`\Hankin\LaravelComment\CommentServiceProvider::class`

Publish configurations and migrations, then migrate comments table.


```
php artisan vendor:publish
php artisan migrate
```


Add canComment trait to your User model.


```
use Hankin\LaravelComment\CanComment;

class User extends Model
{
    use canComment;
    
    // ...   
}
```


Add Commentable interface and HasComments trait to your commentable model(s).


```
use Hankin\LaravelComment\Contracts\Commentable;
use Hankin\LaravelComment\HasComments;

class Product extends Model implements Commentable
{
    use HasComments;
    
    // ...   
}
```

If you want to have your own Comment Model create a new one and extend my Comment model.


```
use Hankin\LaravelComment\Models\Comment LaravelComment;

class Comment extends LaravelComment
{
    // ...
}
```
