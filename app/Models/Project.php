<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(ProjectGroup::class, 'project_group_id');
    }

    public function scopeConstructions($query)
    {
        return $query->where("project_group_id", ProjectType::where("name", ProjectGroup::CONSTRUCTION_GROUP_NAME)->first()->id);
    }

    public function scopeEnergetic($query)
    {
        return $query->where("project_group_id", ProjectType::where("name", ProjectGroup::ENERGETIC_GROUP_NAME)->first()->id);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
