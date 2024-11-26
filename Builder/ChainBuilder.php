<?php

namespace BlackMesa\ChainOfResponsibilityBundle\Builder;

use BlackMesa\ChainOfResponsibilityBundle\Handler\HandlerInterface;

final class ChainBuilder
{
    private array $handlers = [];

    public function addHandler(HandlerInterface $handler): void
    {
        $this->handlers[] = $handler;
    }

    public function build(): ?HandlerInterface
    {
        if (empty($this->handlers)) {
            return null;
        }

        $firstHandler = array_shift($this->handlers);
        $currentHandler = $firstHandler;

        foreach ($this->handlers as $handler) {
            $currentHandler->setNext($handler);
            $currentHandler = $handler;
        }

        return $firstHandler;
    }
}
