<?php

//require 'vendor/autoload.php';

namespace App;

use App\Engine\Wikipedia\WikipediaEngine;
use App\Engine\Wikipedia\WikipediaParser;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

use Symfony\Component\HttpClient\HttpClient;


class WikipediaSearch extends Command
{

    protected function configure()
    {
        $this
            ->setName('wikisearch')
            ->setDescription('retorna o resultado de uma consulta à wikipedia.')
            ->addArgument('sentence');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $wikipedia = new WikipediaEngine(new WikipediaParser(), HttpClient::create());
        $result = $wikipedia->search($input->getArgument('sentence'));

        $iterator = $result->getIterator();
        $rows = [];
        foreach ($iterator as $item) {
            $title =$item->getTitle();
            $preview =$item->getPreview();
            $rows[] = [$title,$preview];
        }

        $resultsTable = new Table($output);
        $resultsTable
            ->setHeaders(['Titutlo','Resumo'])
            ->setRows($rows);

        $resultsTable->render();

        return 0;
    }

}
