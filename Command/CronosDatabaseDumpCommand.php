<?php

namespace CodeWave\CronosDatabaseDumperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronosDatabaseDumpCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setName('cdwv:cronos-database-dumper:update');
        $this->setDescription('Add to crontab command to database backup');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $cronConfiguration = $this->getContainer()->get('cdwv.cron_configuration');

        $cron = $this->getContainer()->get('cdwv.cron_builder')
            ->build($this->getContainer()->get('cdwv.dumper_command_builder')->buildCmd());

        $backupDir = $cronConfiguration->getDumpsLocation();
        $cleanCron = $this->getContainer()->get('cdwv.cron_builder')
            ->build('find ' . $backupDir . '* -mtime +' . $cronConfiguration->getCleanOrderThat() . ' -exec rm {} \;');

        try {
            $this->getContainer()->get('mybuilder.cronos_bundle.cron_process_updater')->updateWith(
                $cron, $cronConfiguration->getKey()
            );
            $this->getContainer()->get('mybuilder.cronos_bundle.cron_process_updater')->updateWith(
                $cleanCron, $cronConfiguration->getKey() . '_clean'
            );
        } catch (\RuntimeException $e) {
            $output->writeln(sprintf('<Comment>Cron cannot be updated - %s<comment>', $e->getMessage()));
        }
    }

}