<?php

namespace App\Domain\Repository;

interface PlantsRepository {
    public function create(array $data):array;

    public function GetAll():array;
    
    public function getAllByCategory(string $category):array;

    //public function GetByCategory(string $category):Array;
}