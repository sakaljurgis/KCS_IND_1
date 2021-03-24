<?php

namespace KCS\Controller;

use KCS\Render;

class BaseController
{
    /**
     * @var Render
     */
    public Render $render;

    public function __construct(Render $render)
    {
        $this->render = $render;
    }
}
