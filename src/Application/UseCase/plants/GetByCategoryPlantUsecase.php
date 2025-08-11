<?php

namespace App\Application\UseCase\plants;

use App\domain\Repository\PlantsRepository;


class GetByCategoryPlantUsecase{
    
    public function __construct(private PlantsRepository $repo) {}

    public function getAllByCategory(string $category): array
    {

        return $this->repo->getAllByCategory($category);
    }
}