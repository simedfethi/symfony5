<?php
echo dirname(__dir__);
require_once dirname(__dir__).'/vendor/autoload.php';

use Symfony\Component\Console\Application;

$application =new Application();
$application->run();