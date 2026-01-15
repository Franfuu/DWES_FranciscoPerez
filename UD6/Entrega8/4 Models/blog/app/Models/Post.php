<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'published'];

    // Accessor
    public function getTitleAttribute($value)
    {
        return ucfirst($value); // Capitalize the first letter of the title
    }

    // Scope
    public function scopePublished($query)
    {
        return $query->where('published', true); // Filter to get only published posts
    }

    // Auto-insert sample posts when the model is first loaded
    protected static function booted()
    {
        if (self::count() === 0) { // Check if there are no posts
            // Insert sample posts
            self::create([
                'title' => 'welcome post',
                'body' => 'This is a welcome post created automatically.',
                'published' => true,
            ]);

            self::create([
                'title' => 'draft example',
                'body' => 'This post is a draft and won’t show on the page.',
                'published' => false,
            ]);
        }
    }
}