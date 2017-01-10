<?php

namespace CodeWave\CronosDatabaseDumberBundle\Cron;

use MyBuilder\Cronos\Formatter\Cron;

class CronJobBuilder
{
    /** @var Cron */
    private $cron;

    public function __construct(Cron $cron)
    {
        $this->cron = $cron;
    }

    public function build(CronConfiguration $cronConfiguration, $command)
    {
        $this->cron
            ->job($command)
            ->setMinute($cronConfiguration->getMinute())
            ->setHour($cronConfiguration->getHour())
            ->end();

        return $this->cron;
    }
}