<?php

namespace CodeWave\CronosDatabaseDumberBundle\Cron;

class CronConfiguration
{
    private $hour;
    private $minute;
    private $key;

    public function setConfig($config)
    {
        $this->hour = $config['hour'];
        $this->minute = $config['minute'];
        $this->key = $config['key'];
    }

    public function getHour()
    {
        return $this->hour;
    }

    public function getMinute()
    {
        return $this->minute;
    }

    public function getKey()
    {
        return $this->key;
    }
}