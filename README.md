Description
------------
This bundle populates your crontab with tasks that will backup your databases using mysqldump.

Requirements
------------
Backups are created using the `mysqldump` command which means you need to have at least 
`mysql-client` package installed on your server. 

```
sudo apt-get update
sudo apt-get install mysql-client
```

Installation
------------
add repository to composer.json:

```
{
    "type": "vcs",
    "url": "ssh://git@git.cdwv.pl:23/cdwv/cronos-database-dumper.git"
}
```
run:
```
composer require cdwv/mysql-dumper-command-bundle
composer require codewave/cronos-database-dumper
```

add bundle to AppKernel:
```
new CodeWave\CronosDatabaseDumperBundle\CodeWaveCronosDatabaseDumperBundle(),
new CodeWave\MysqlDumperCommandBundle\CodeWaveMysqlDumperCommandBundle()
```

Run:
------------

```
    cdwv:cronos-database-dumper:update
```

Configuration:
------------
in config.yml, defaults values:
```
    code_wave_cronos_database_dumper:
            minute: 4
            hour: 0
            dumps_location: .
            key: app_name
            php_path: /usr/bin/php
            env: prod 
            clean_order_that: 14 #days
```

Crontab:
------------

The above configuration will result in the following entry in your crontab:
```text
# KEY app_name
0    4    *    *    *    /usr/bin/php __PATH_TO_YOUR_PROJECT__/app/console cdwv:database:dump --env=prod --path=.

0    4    *    *    *    find * -mtime +14 -exec rm {} \;
# END
```

This task will dump **all** of the databases from within your symfony project if there are connections defined for them.

Bear in mind that `__PATH_TO_YOUR_PROJECT__` will contain resolved symlinks which means that you might need to call
`cdwv:cronos-database-dumper:update` each time the path to new version of the app will change 
(e.g. if you have releases named by build number).
