<?php

namespace Gridonic\Console;

use Symfony\Component\EventDispatcher\Event;
use Gridonic\Console\Application;

class ConsoleEvent extends Event
{
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function getApplication()
    {
        return $this->application;
    }
}
