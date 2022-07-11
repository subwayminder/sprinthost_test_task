<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\AnimalType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Animal[] $animals
 * @property-read int|null $animals_count
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnimalType query()
 * @mixin \Eloquent
 */
class AnimalType extends Model
{
    use HasFactory;

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
