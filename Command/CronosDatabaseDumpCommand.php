<?php

namespace CodeWave\CronosDatabaseDumberBundle\Command;

use CodeWave\MysqlDumperCommandBundle\Command\MysqlDumperCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Command for sending our email messages from the database.
 *
 * @Cron(hour="/24", noLogs=true, server="web")
 */
class CronosDatabaseDumpCommand extends MysqlDumperCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
    }
}