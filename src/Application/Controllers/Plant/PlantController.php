<?php

namespace App\Application\Controllers\Plant;

use App\Application\UseCase\plants\GetAllPlants;
use App\Application\UseCase\plants\CreatePlantUsecase;
use App\Domain\Repository\PlantsRepository;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlantController
{
    public function __construct(private PlantsRepository $repo) {}

    public function getAll(Request $request, Response $response): Response
    {
        $useCase = new GetAllPlants($this->repo);
        $plant = $useCase->execute();

        if(!$plant) {
            $response->getBody()->write(json_encode(["error" => "No hay datos registrados"]));
            return $response->withStatus(404);
        }
        $response->getBody()->write(json_encode($plant));

        return $response;
    }

    
    public function create(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        if(!$data| !is_array($data)) {
            $response->getBody()->write(json_encode([
                "error" => "Datos invalidos o faltantes en la solicitud"
            ]));
            return $response->withStatus(400)->withHeader('Content-Type', 'application/json');
        }

        try {
            $useCase = new CreatePlantUsecase($this->repo);
            $coffee = $useCase->execute($data);

            $response->getBody()->write(json_encode([
                "message" => "Datos insertados correctamente",
                "data" => $coffee
            ]));

            return $response->withStatus(201)->withHeader('Content-Type', 'application/json');
            
        } catch (Exception $e) {
            $response->getBody()->write(json_encode([
                "error" => "Error al crear: " . $e->getMessage()
            ]));
            return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
        }
    }

}