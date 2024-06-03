<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeFromProject($query, Project $project)
    {
        return $query->where(function ($query) use ($project) {
            $query->where('project_id', $project->id);
        });
    }
}
