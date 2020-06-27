<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('greet')
            ->setDescription('exibe mensagem de boas vindas.')
            ->addArgument('name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Olá, seja bem vindo ' . $input->getArgument('name') . '.');
        return 0;
    }
}