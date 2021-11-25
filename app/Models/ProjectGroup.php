<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    use HasFactory;
    public $timestamps = false;

    const CONSTRUCTION_GROUP_TITLE = 'Строительные проекты';
    const ENERGETIC_GROUP_TITLE = 'Энергетические проекты';

    public function projects()
    {
        return $this->hasMany(Project::class)->latest();
    }

}
