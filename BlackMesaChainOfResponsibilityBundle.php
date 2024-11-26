<?php

namespace BlackMesa\ChainOfResponsibilityBundle;

use BlackMesa\ChainOfResponsibilityBundle\DependencyInjection\ChainOfResponsibilityExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class BlackMesaChainOfResponsibilityBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if ($this->extension === null) {
            $this->extension = new ChainOfResponsibilityExtension();
        }

        return $this->extension;
    }
}
