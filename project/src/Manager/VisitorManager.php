<?php

namespace KCS\Manager;

use KCS\Model\ModelInterface;
use KCS\Repository\VisitorsRepository;

class VisitorManager
{
    /**
     * @var VisitorsRepository
     */
    private VisitorsRepository $repository;

    public function __construct(VisitorsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllVisitors(): array
    {
        return $this->repository->all();
    }

    public function store($params): ModelInterface
    {
        // @TODO: Do some Validations here
        return $this->repository->store($params);
    }
}