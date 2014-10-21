<?php

namespace Gridonic\Provider;

use Silex\ServiceProviderInterface;
use Silex\Application;

use Gridonic\Console\Application as ConsoleApplication;
use Gridonic\Console\ConsoleEvents;
use Gridonic\Console\ConsoleEvent;

class ConsoleServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['console'] = $app->share(function() use ($app) {
            $application = new ConsoleApplication(
                $app,
                $app['console.project_directory'],
                $app['console.name'],
                $app['console.version']
            );

            $app['dispatcher']->dispatch(ConsoleEvents::INIT, new ConsoleEvent($application));

            return $application;
        });
    }

    public function boot(Application $app)
    {
    }
}
