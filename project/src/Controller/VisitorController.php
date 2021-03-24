<?php

namespace KCS\Controller;

use KCS\Manager\VisitorManager;
use KCS\Render;

class VisitorController extends BaseController
{
    /**
     * @var VisitorManager
     */
    private VisitorManager $manager;

    public function __construct(VisitorManager $manager, Render $render)
    {
        parent::__construct($render);
        $this->manager = $manager;
    }

    public function index(): void
    {
        $lankytojai = $this->manager->getAllVisitors();

        $this->render->render($lankytojai);
    }

    public function store($params): void
    {
        $lankytojas = $this->manager->store($params);
        $this->render->render($lankytojas);
    }
}