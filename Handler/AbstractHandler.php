<?php

namespace BlackMesa\ChainOfResponsibilityBundle\Handler;

abstract class AbstractHandler implements HandlerInterface
{
    protected ?HandlerInterface $nextHandler = null;
    protected ?HandlerInterface $previousHandler = null;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function setPrevious(HandlerInterface $handler): HandlerInterface
    {
        $this->previousHandler = $handler;
        return $this;
    }

    public function getNext(): ?HandlerInterface
    {
        return $this->nextHandler;
    }

    public function getPrevious(): ?HandlerInterface
    {
        return $this->previousHandler;
    }

    public function hasNext(): bool
    {
        return $this->nextHandler !== null;
    }

    public function hasPrevious(): bool
    {
        return $this->previousHandler !== null;
    }

    public function handle(mixed $request): mixed
    {
        return $this->nextHandler?->handle($request);
    }
}
