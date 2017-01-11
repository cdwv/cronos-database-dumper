<?php

namespace CodeWave\CronosDatabaseDumperBundle\Command;

use CodeWave\MysqlDumperCommandBundle\Command\MysqlDumperCommand;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronosDatabaseDumpCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setName('cdwv:cronos-database-dumer:dump');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $cronConfiguration = $this->getContainer()->get('cdwv.cron_configuration');

        $cron = $this->getContainer()->get('cdwv.cron_builder')
            ->build($cronConfiguration, $this->buildMysqlDumCommand());

        try {
            $this->getContainer()->get('mybuilder.cronos_bundle.cron_process_updater')->updateWith(
                $cron, $cronConfiguration->getKey()
            );
        } catch (\RuntimeException $e) {
            $output->writeln(sprintf('<Comment>Cron cannot be updated - %s<comment>', $e->getMessage()));
        }
    }

    private function buildMysqlDumCommand($phpPath = '/usr/bin/php')
    {
        $dumperCommand = new MysqlDumperCommand();
        $dumperCommandName = $dumperCommand->getName();

        $rootPath = $this->getContainer()->get('kernel')->getRootDir();
        $cmd = $phpPath . ' ' . $rootPath . '/console ' . $dumperCommandName . ' --env=prod';

        return $cmd;
    }
}