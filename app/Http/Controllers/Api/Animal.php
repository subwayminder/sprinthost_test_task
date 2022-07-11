<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Animal as AnimalModel;
use Illuminate\Support\Arr;
use Validator;

class Animal extends Controller
{
    public function create(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'type_id' => 'required|int',
        ]);
        $newAnimal = AnimalModel::where('name', $fields['name'])->first() ?: new AnimalModel();
        if ($newAnimal->setData($fields))
            return response()->json([
                'error' => null,
                'success' => true
            ]);
        return response()->json([
            'error' => 'Animal creation error',
            'success' => false
        ]);
    }

    public function getAll()
    {
        return response()->json([
            'success' => true,
            'data' => AnimalModel::all()->load('animalType')->toArray(),
        ]);
    }

    public function getAnimalByName(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string'
        ]);
        $animal = AnimalModel::where('name', $fields['name'])->first();
        if ($animal) return response()->json([
            'success' => true,
            'data' => $animal->toArray()
        ]);
        else return response()->json([
            'success' => false,
            'message' => 'Animal not found',
        ]);
    }

    public function deleteAnimalByName(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string'
        ]);
        $animal = AnimalModel::where('name', $fields['name'])->first();
        if ($animal)
        {
            $animal->delete();
            return response()->json([
                'success' => true,
                'data' => $animal->toArray()
            ]);
        }
        else return response()->json([
            'success' => false,
            'message' => 'Animal not found',
        ]);
    }

    public function makeOlder(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'years' => 'int',
        ]);
        $animal = AnimalModel::where('name', $fields['name'])->with('animalType')->first();
        if (!$animal) return response()->json([
            'success' => false,
            'message' => 'Animal not found',
        ]);
        $type = $animal->animalType;
        $years = Arr::get($fields,'years', 1);
        $calculatedSize = $years * $type->growth_factor;
        $animal->size = min($type->max_size, $animal->size + $calculatedSize);
        $animal->age += $years;
        $animal->save();
        return response()->json([
            'success' => true,
            'message' => 'ok'
        ]);
    }
}
