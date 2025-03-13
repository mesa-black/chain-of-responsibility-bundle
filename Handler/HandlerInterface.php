<?php

namespace BlackMesa\ChainOfResponsibilityBundle\Handler;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): HandlerInterface;
    public function setPrevious(HandlerInterface $handler): HandlerInterface;
    public function getNext(): ?HandlerInterface;
    public function getPrevious(): ?HandlerInterface;
    public function hasNext(): bool;
    public function hasPrevious(): bool;
    public function handle(mixed $request): mixed;
    public function isSupported(mixed $request): bool;
}
