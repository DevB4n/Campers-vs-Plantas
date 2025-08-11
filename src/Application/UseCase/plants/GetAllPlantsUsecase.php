<?php

namespace App\Application\UseCase\plants;

use App\domain\Repository\PlantsRepository;

class GetAllPlants
{
    public function __construct(private PlantsRepository $repo) {}

    public function execute(): array
    {
        return $this->repo->getAll();
    }
}