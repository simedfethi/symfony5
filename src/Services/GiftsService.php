<?php
namespace App\Services;
use Psr\Log\LoggerInterface;

class GiftsService {

  public $gifts=['gift1','gift2','piano','money','flowers','ddfdfd','fffff','fffdf','ffdsf','34'];

    /**
     * GiftsService constructor.
     * @param string[] $gifts
     */
    public function __construct(LoggerInterface $logger)
    {
        $logger->info('goft ramdomized');
        shuffle($this->gifts);

    }


}