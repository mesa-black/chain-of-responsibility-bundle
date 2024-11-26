<?php

namespace BlackMesa\ChainOfResponsibilityBundle\Handler;

interface HandlerInterface
{
    public function handle(mixed $request): ?string;
    public function setNext(HandlerInterface $handler): HandlerInterface;
    public function isSupported(mixed $request): bool;
}
