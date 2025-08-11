<?php

namespace App\Infrastructure\Persistence\plants;

use App\Domain\Model\Plant\Plant;
use App\Domain\Repository\PlantsRepository;
use Illuminate\Database\Capsule\Manager as Capsule;


class EloquentPlantsRepository implements PlantsRepository{
    public function getAll(): array
    {
        $plants = Plant::with(['name', 'category', 'family'])->get();
    
        $result = [];
    
        foreach ($plants as $plant) {

            // No necesitas limpiar si sólo usas nombre/característica
            $result[] = [
                'id' => $plant->id,  // solo el id principal
                'name' => $plant->name,
                'category' => $plant->category,
                'family' => $plant->family,
            ];
        }
    
        return $result;
    }
    
    public function create(array $data): array
    {
        return Capsule::connection()->transaction(function () use ($data) {

            $plant = new Plant([
                'name' => $data['plant']['name'],
                'category' => $data['plant']['category'],
                'family' => $data['plant']['family'],
            ]);

            $plant->save();

            return $plant->load([
                'name',
                'category',
                'family',
            ])->toArray();
        });
    }

    
    public function getAllByCategory(string $category): array
    {
        $plants = Plant::with(['name','category','family'])->get();

        $result = [];

        foreach ($plants as $plant) {
            $category = $plant->category ?? null;

            $value = match ($category) {

                // 🟤 GRANO
                'name' => $plant->name ?? null,
                'category' => $plant->category ?? null,
                'family' => $plant->family ?? null,
                default => null};
            };

            if ($value !== null && $category !== null) {
                $result[] = [
                    'category' => $category,
                    $category => $value,
                ];
            }
            return $result;
        }
    }

