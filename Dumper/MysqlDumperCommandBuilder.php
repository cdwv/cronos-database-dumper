<?php

namespace CodeWave\CronosDatabaseDumperBundle\Dumper;

use CodeWave\CronosDatabaseDumperBundle\Cron\CronConfiguration;
use CodeWave\MysqlDumperCommandBundle\Command\MysqlDumperCommand;

class MysqlDumperCommandBuilder
{
    private $configuration;
    private $rootPath;


    public function __construct(CronConfiguration $configuration, $rootPath)
    {
        $this->configuration = $configuration;
        $this->rootPath = $rootPath;
    }

    public function buildCmd()
    {
        $dumperCommand = new MysqlDumperCommand();
        $dumperCommandName = $dumperCommand->getName();

        $cmd = $this->configuration->getPhpPath() . ' ' . $this->rootPath . '/console ' . $dumperCommandName . $this->configuration->getEnv();

        return $cmd;
    }
}