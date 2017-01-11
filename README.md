Description
------------
Bundel który dodaje do projektu komendę która z kolei dodaje do crontaba zadanie które tworzy kopie zapasową baz danych

Installation
------------

```
composer require cdwv/mysql-dumper-command-bundle
composer require cdwv/cdwv/cronos-database-dumper
```

add bundle to AppKernel:
```
new CodeWave\CronosDatabaseDumperBundle\CodeWaveCronosDatabaseDumperBundle(),
new \CodeWave\MysqlDumperCommandBundle\CodeWaveMysqlDumperCommandBundle()
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
```