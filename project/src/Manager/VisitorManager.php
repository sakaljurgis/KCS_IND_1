<?php

namespace KCS\Manager;

use KCS\Dtos\VisitorDto;
use KCS\Model\AddressModel;
use KCS\Model\ModelInterface;
use KCS\Model\VisitorModel;
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

    public function store(VisitorDto $dto): ModelInterface
    {
        //$this->validator->validate(VisitorModel::class, $dto);
        return $this->repository->storeAndReturn($dto->toArray());
    }
}