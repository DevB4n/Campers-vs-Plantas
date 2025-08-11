<?php

namespace App\Application\UseCase\plants;

use App\domain\Repository\PlantsRepository;


class CreatePlantUsecase
{
    public function __construct(private PlantsRepository $repo) {}

    public function execute(array $data): array
    {
        return $this->repo->create($data);
    }
}
