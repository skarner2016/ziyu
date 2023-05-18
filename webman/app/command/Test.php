<?php

namespace app\command;

use app\model\User;
use app\enum\app\ConnMySQL;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;


class Test extends Command
{
    protected static $defaultName = 'command:Test';
    protected static $defaultDescription = 'Test';
    
    /**
     * @return void
     */
    protected function configure()
    {
        $this->addArgument('name', InputArgument::OPTIONAL, 'Name description');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $res = ConnMySQL::default;
    

        dd($res, 'test');

        $output->writeln($res ?? '$res === null');
        return self::SUCCESS;
    }

}
