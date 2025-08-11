<?php

use App\Application\Controllers\Plant\PlantController;
use Slim\App;

return function(App $app) {
    $app->group('/plant', function($group) {
        $group->get('', [PlantController::class, 'getAll']);
        $group->post('/post', [PlantController::class, 'create']);
    });
};