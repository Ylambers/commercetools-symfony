<?php
/**
 * @author: Ylambers <yaron.lambers@commercetools.de>
 */

namespace Commercetools\Symfony\CtpBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('commercetools');

        $rootNode
            ->children()
//                ->arrayNode('commercetools')
//                    ->children()
                        ->scalarNode('client_id')->end()
                        ->scalarNode('client_secret')->end()
                        ->scalarNode('project')->end()
                        ->arrayNode('cache')
                            ->prototype('boolean')->end()
                        ->end()
//                    ->end()
//                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}