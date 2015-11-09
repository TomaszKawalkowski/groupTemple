<?php
/**
 * Created by PhpStorm.
 * User: Tomasz
 * Date: 2015-11-03
 * Time: 11:31
 */

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class checkLoginCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName("temple:checkLoginQuantity")
            ->setDescription("returns quantity of logins in last n hours")//opisuje funkcjê konsoli
            ->addArgument(
                'from date - format Y-m-d H:i:s'
            );

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repo = $this->getContainer()->get('doctrine')->getRepository('AppBundle:User')->findAll();
        $inputDate = $input->getArgument('from date - format Y-m-d H:i:s');

        foreach ($repo as $user) {

            $date = $user->getLastLogin()->format('Y-m-d H:i:s');

            if (strtotime($inputDate) <= strtotime($date)) {
                $output->writeln($user->getUsername());
                $output->writeln($user->getLastLogin());
            }
        }
    }
}