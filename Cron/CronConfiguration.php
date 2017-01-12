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
    /** @var  string */
    private $dumpsLocation;

    public function setConfig($config)
    {
        $this->hour = $config['hour'];
        $this->minute = $config['minute'];
        $this->key = $config['key'];
        $this->phpPath = $config['php_path'];
        $this->env = $config['env'];
        $this->dumpsLocation = $config['dumps_location'];
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
    public function getDumpsLocation()
    {
        return $this->dumpsLocation;
    }
}