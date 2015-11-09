<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class HelloCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName("hello:test")
            ->setDescription("opis funkcji testowy")//opisuje funkcjê konsoli
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Who do you want to greet?'
            )
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'if set, the task will yell in uppercase letters'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $text = ($name) ? 'Hello ' . $name : 'Hello ';

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
        }
        $output->writeln($text . ' ' . date('Y-m-d|H:i:s')); //writeln po wywo³aniu robi enter
    }
}

