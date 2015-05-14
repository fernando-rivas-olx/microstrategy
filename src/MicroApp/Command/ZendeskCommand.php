<?php

namespace MicroApp\Command;

use MicroApp\Zendesk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ZendeskCommand extends Command
{
    private $zend;

    public function __construct(Zendesk $zend)
    {
        parent::__construct();
        $this->zend = $zend;
    }

    protected function configure()
    {
        $this
            ->setName('tickets:get')
            ->setDescription('Get tickets')
            ->addOption(
                'limit',
                null,
                InputOption::VALUE_OPTIONAL,
                'Limit the query max value 100'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $paramas = array(
            'per_page'=> $input->getOption('limit')
        );

        $result = $this->zend->getAll($paramas);

        $output->writeln(count($result->tickets));
    }
}
