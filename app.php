<?php

require 'vendor/autoload.php';

$console = new \Symfony\Component\Console\Application();
$console->add(new \App\GreetCommand());
$console->run();