<?php

namespace CodeWave\CronosDatabaseDumperBundle\Cron;

class CronConfiguration
{
    /** @var int */
    private $hour;
    /** @var int */
    private $minute;
    /** @var string */
    private $key;
    /** @var string */
    private $phpPath;
    /** @var string */
    private $env;
    /** @var string */
    private $dumpsLocation;
    /** @var int */
    private $cleanOrderThan;

    public function setConfig($config)
    {
        $this->hour = $config['hour'];
        $this->minute = $config['minute'];
        $this->key = $config['key'];
        $this->phpPath = $config['php_path'];
        $this->env = $config['env'];
        $this->dumpsLocation = $config['dumps_location'];
        $this->cleanOrderThan = $config['clean_older_than'];
    }

    /** @return int */
    public function getHour()
    {
        return $this->hour;
    }

    /** @return int */
    public function getMinute()
    {
        return $this->minute;
    }

    /** @return string */
    public function getKey()
    {
        return $this->key;
    }

    /** @return string */
    public function getPhpPath()
    {
        return $this->phpPath;
    }

    /** @return string */
    public function getEnv()
    {
        return $this->env;
    }

    /** @return string */
    public function getDumpsLocation()
    {
        return $this->dumpsLocation;
    }

    /** @return int */
    public function getCleanOrderThan()
    {
        return $this->cleanOrderThan;
    }
}