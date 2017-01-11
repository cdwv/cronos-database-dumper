<?php

namespace CodeWave\CronosDatabaseDumperBundle\Cron;

use MyBuilder\Cronos\Formatter\Cron;

class CronJobBuilder
{
    /** @var Cron */
    private $cron;
    private $configuration;

    public function __construct(Cron $cron, CronConfiguration $configuration)
    {
        $this->cron = $cron;
        $this->configuration = $configuration;
    }

    public function build($command)
    {
        $this->cron
            ->job($command)
            ->setMinute($this->configuration->getMinute())
            ->setHour($this->configuration->getHour())
            ->end();

        return $this->cron;
    }
}