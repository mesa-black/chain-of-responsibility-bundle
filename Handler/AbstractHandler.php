<?php

namespace BlackMesa\ChainOfResponsibilityBundle\Handler;

abstract class AbstractHandler implements HandlerInterface
{
    protected ?HandlerInterface $nextHandler = null;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;

        return $handler;
    }

    public function handle(mixed $request): ?string
    {
        return $this->nextHandler?->handle($request);
    }
}
