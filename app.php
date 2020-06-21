<?php

require 'vendor/autoload.php';

$console = new \Symfony\Component\Console\Application();
$console->add(new \App\GreetCommand());

$console->add(new \App\Engine\Wikipedia\WikipediaEngine(new \App\Engine\Wikipedia\WikipediaParser(),HttpClient::create()));

$console->run();