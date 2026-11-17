<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'body', 'image',
        'image_alt', 'stack', 'url', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'stack' => 'array',
            'is_published' => 'boolean',
        ];
    }

    // URLs com o slug (/projetos/habilux) em vez do id (/projetos/1)
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Permite escrever Project::published()->get()
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
