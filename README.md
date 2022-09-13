## Documentation

To get started with **Base Repository**, use Composer to add the package to your project's dependencies:

```bash
    composer require rebbull/dev
```

## Configuration

### Laravel 
```php
'providers' => [
    // Other service providers...

    Rebbull\RepositoryServiceProvider::class,
],
```

### Basic Usage

Next, you are ready to use repository. If you want create repository with Model corresponding(example:UserRepository), run commnand line 

```bash

php artisan make:repository UserRepository -i
```
When run this commnand, Packeage automatic generate two file in forder Repository: UserRepository and UserRepositoryInterface. 
UserRepository extends AbstractRepository so you can use method in AbstractRepository

```php
<?php

namespace App\Repositories;

use App\Models\User;
use Rebbull\Repository\Contracts\AbstractRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
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

Next, create controller, run commnand line 

```bash

php artisan make:con UserController -c
```
When run this commnand, Packeage automatic generate file in forder Http/Controller/Api: UserController. 
UserController extends baseController.
```php
<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\UserRepositoryInterface;
use Rebbull\Http\Controllers\Api\BaseController;

class UserController extends BaseController
{
    protected $tag;

    public function __construct(userRepositoryInterface $tag)
    {
        parent::__construct($tag);
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

In the controller you can completely override the methods you want

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Rebbull\Http\Controllers\Api\BaseController;

class UserController extends BaseController
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
        //
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

public function allTrashed(): Collection;

public function findTrashedById(int $id): ?Model;

public function findOnlyTrashedById(int $id): ?Model;

public function restoreById(int $id): bool;

public function permanentlyDeleteById(int $id): bool;
