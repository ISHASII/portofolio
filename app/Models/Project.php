<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'tech_stack',
        'project_url',
        'github_url',
        'featured',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('position');
    }

    // Return tech stack as array of trimmed values
    public function getTechStackArrayAttribute()
    {
        if (empty($this->tech_stack)) return [];
        return collect(explode(',', $this->tech_stack))
            ->map(fn($v) => trim($v))
            ->filter()
            ->values()
            ->all();
    }

    // Helper to get all image URLs (cover + detail images)
    public function getImageUrlsAttribute()
    {
        $urls = [];

        if ($this->cover_image) {
            $urls[] = asset('storage/' . $this->cover_image);
        } elseif ($this->image) {
            // fallback to old single image
            $urls[] = asset('storage/' . $this->image);
        }

        foreach ($this->images as $img) {
            $urls[] = asset('storage/' . $img->path);
        }

        return $urls;
    }
}
