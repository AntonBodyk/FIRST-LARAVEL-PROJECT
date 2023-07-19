<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Service;

class BaseController extends Controller {
    public $service;                    //ПОДКЛЮЧЕНИЕ СЕРВИСА К КОНТРОЛЛЕРУ 

    public function __construct(Service $service)       //СОЗДАЕМ КОНСТРУКТ НА ОСНОВЕ КЛАССА СЕРВИС 
    {
        $this->service = $service;
    }
}