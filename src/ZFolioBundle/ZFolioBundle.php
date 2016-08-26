<?php

namespace ZFolioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZFolioBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
