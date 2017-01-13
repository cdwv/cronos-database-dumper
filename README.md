Description
------------
Bundel który dodaje do projektu komendę, która z kolei dodaje do crontaba zadania,
 tworzące kopie zapasową baz danych

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
            clean_order_that: 14 #dni
```