## Documentation

To get started with **Base Repository**, use Composer to add the package to your project's dependencies:

```bash
    composer require rebbull/repo
```

## Configuration

### Laravel 
```php
'providers' => [
    // Other service providers...

    Rebbull\Repository\Providers\RepositoryServiceProvider::class,
],
```

### Basic Usage

Next, you are ready to use repository. If you want create repository with Model corresponding(example:UserRepository), run commnand line 

```bash

php artisan make:repository UserRepository -i
```
When run this commnand, Packeage automatic generate two file in forder Repository: UserRepository and UserRepositoryInterface. 
UserRepository extends EloquentRepository so you can use method in EloquentRepository

```php
<?php

namespace App\Repositories;

use App\Models\User;
use Rebbull\Repository\Contracts\EloquentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    protected $model;

    /**
     * UserRepository construct
     *
     * @param  mixed $model
     *
     * @return void
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
```
Register in AppServiceProvider
```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
```


#### Retrieving User Details

In controller, You want find user by id use repository

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $user;

    public function __construct(UserRepositoryInterface $user )
    {
        $this->user = $user;
    }

    public function show($id) 
    {
        $user = $this->user->show($id);

        return response()->json([
            'data' => $user
        ], 200);
    }
}
```
All function in base repository
```
public function all(array $attributes, array $relations = []): Collection;

public function store(array $attributes): ?Model;

public function show(int $id): ?Model;

public function update(int $id ,array $attributes): bool;

public function destroy(int $id): bool;