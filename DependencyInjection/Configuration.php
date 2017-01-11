<?php

namespace CodeWave\CronosDatabaseDumperBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('code_wave_cronos_database_dumber');

        $rootNode
            ->children()
                ->scalarNode('hour')
                    ->defaultValue('4')
                ->end()
                ->scalarNode('minute')
                    ->defaultValue('0')
                ->end()
                ->scalarNode('dumps_location')
                    ->defaultValue('default')
                ->end()
                ->scalarNode('key')
                    ->defaultValue('default')
                ->end()
                ->scalarNode('php_path')
                   ->defaultValue('/usr/bin/php')
                ->end()
                ->scalarNode('env')
                  ->defaultValue('prod')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
