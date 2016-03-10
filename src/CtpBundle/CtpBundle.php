<?php

namespace Commercetools\Symfony\CtpBundle;

use Commercetools\Symfony\CtpBundle\DependencyInjection\CommercetoolsExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CtpBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CommercetoolsExtension();
    }
}
