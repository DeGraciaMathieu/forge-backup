<?php

namespace App;


use App\Services\Config;
use App\Services\Connector;
use Exception;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class Runner
{
    private ContainerBuilder $containerBuilder;

    public function __construct()
    {
        $this->registerServices();
    }

    public function run()
    {
        try {
            /** @var Connector $connector */
            $connector = $this->containerBuilder->get('connector');

            $servers = $connector->getServers();

            foreach ($servers as $server) {
                $sites = $connector->getSites($server);

                dd($sites);
            }
        } catch (Exception $e) {
            dd($e);
            return 1;
        }
    }

    private function registerServices()
    {
        $this->containerBuilder = new ContainerBuilder();

        $this->containerBuilder->register('http', Client::class);

        $this->containerBuilder->register('config', Config::class)
            ->addArgument(
                include __DIR__ . '/../config/config.php'
            );

        $this->containerBuilder
            ->register('connector', Connector::class)
            ->addArgument(new Reference('http'))
            ->addArgument(new Reference('config'));
    }
}
