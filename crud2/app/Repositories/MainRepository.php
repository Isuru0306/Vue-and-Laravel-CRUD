<?php
namespace App\Repositories;

use App\Contracts\MainRepositoryInterface;
use Illuminate\Contracts\Container\Container as App;
abstract class MainRepository implements MainRepositoryInterface
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();


    /**
     * @return mixed
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        return $this->model = $model;
    }


}
