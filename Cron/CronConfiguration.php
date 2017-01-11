<?php

namespace CodeWave\CronosDatabaseDumperBundle\Cron;

class CronConfiguration
{
    /** @var  string */
    private $hour;
    /** @var  string */
    private $minute;
    /** @var  string */
    private $key;
    /** @var  string */
    private $phpPath;
    /** @var  string */
    private $env;

    public function setConfig($config)
    {
        $this->hour = $config['hour'];
        $this->minute = $config['minute'];
        $this->key = $config['key'];
        $this->phpPath = $config['phpPath'];
        $this->env = $config['env'];
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

    public function getPhpPath()
    {
        return $this->phpPath;
    }

    public function getEnv()
    {
        return $this->env;
    }
}