<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'project_id', 'priority'];

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

    public function scopeFromProjectId($query, int $project_id)
    {
        return $query->where(function ($query) use ($project_id) {
            $query->where('project_id', $project_id);
        });
    }
}
