<?php

namespace KCS\Controller;

use KCS\Manager\VisitorManager;
use KCS\Dtos\VisitorDto;
use KCS\Dtos\AddressDto;
use KCS\Render;
use KCS\Services\RequestHandlerService;
use KCS\Services\RequestValidator;
use KCS\ValidationRules\VisitorValidationRules;
use Pecee\Http\Response;
use Pecee\SimpleRouter\SimpleRouter;

class VisitorController extends BaseController
{
    /**
     * @var VisitorManager
     */
    private VisitorManager $manager;
    private VisitorValidationRules $visitorValidationRules;

    public function __construct(VisitorManager $manager, Render $render, RequestHandlerService $requestHandler, RequestValidator $requestValidator)
    {
        parent::__construct($render, $requestHandler, $requestValidator);
        $this->manager = $manager;
    }

    public function index(): array
    {
        $lankytojai = $this->manager->getAllVisitors();

        return $lankytojai;
    }

    public function store(): void
    {
        //$addressDto = $this->requestHandler->getModelDto(AddressDto::class);
        //var_dump($addressDto);
        
        $this->requestValidator->validate(new visitorValidationRules());
        
        $visitorDTO = $this->requestHandler->getModelDto(VisitorDto::class);
        
        
        
        //$address = $this->addressManager->getOrCreate($addressDto);

        $lankytojas = $this->manager->store($visitorDTO);

        //$lankytojas->setAddressId($address->getId());
        //$lankytojas = $this->manager->update($lankytojas);

        $this->render->render($lankytojas);
    }
    
    public function show($id): void
    {   
        echo "todo VisitorController->show($id)";
    }
    
}