<?php

namespace App\Services;

use Doctrine\Common\Annotations\Annotation\Required;

class myService
{

    public function __construct($param,$param2,$globalVar)
    {
        dump($param);
        dump($param2);
        dump($globalVar);
    }

    /**
     * @Required
     */
    public function setSecondServices (secondService $secondService ){

    }
}