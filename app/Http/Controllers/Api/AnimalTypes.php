<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnimalType;

class AnimalTypes extends Controller
{
    public function getAll()
    {
        return response()->json([
            'success' => true,
            'data' => AnimalType::all()->load('animals')->toArray(),
        ]);
    }
}
