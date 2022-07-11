<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

/**
 * App\Models\Animal
 *
 * @property-read \App\Models\AnimalType|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Animal query()
 * @mixin \Eloquent
 */
class Animal extends Model
{
    use HasFactory;

    public function animalType(): BelongsTo
    {
        return $this->belongsTo(AnimalType::class);
    }

    public function setData(array $data)
    {
        try {
            $this->name = Arr::get($data, 'name', 'undefined');
            $this->age = Arr::get($data, 'age', 1);
            $this->size = Arr::get($data, 'size', 1);
            $type = AnimalType::find(Arr::get($data, 'type_id', 'undefined'));
            $type->animals()->save($this);
            return $this->save();
        }
        catch (\Exception)
        {
            return false;
        }

    }
}
