<?php

namespace app\command;

use app\enum\App;
use support\Redis;
use app\model\User;
use app\enum\MessageCode;
use app\service\CommonService;
use Symfony\Component\String\CodePointString;
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
        // $res = generate_random_code(-8);
    
    $cacheKey = "abc";
    $ttl = 60;
    $value = "123";
    
        // $res = Redis::connection(App::REDIS_DEFAULT)
        //     ->client()
        //     ->setEx($cacheKey, $ttl, $value);
        

        $output->writeln($res ?? '$res === null');
        return self::SUCCESS;
    }

}
