<?php

namespace App\UI\Controller\http;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use League\Tactician\CommandBus;

class BaseController extends Controller
{
    /** @var CommandBus */
    protected $commandBus;

    /**
     * BaseController constructor.
     *
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @return CommandBus
     */
    public function getCommandBus(): CommandBus
    {
        return $this->commandBus;
    }

    /**
     * @param CommandBus $commandBus
     */
    public function setCommandBus(CommandBus $commandBus): void
    {
        $this->commandBus = $commandBus;
    }
}
