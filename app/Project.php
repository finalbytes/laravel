<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function($project) {
            $project->slug = str_slug($project->name);

            $latestSlug =
                static::whereRaw("slug RLIKE '^{$project->slug}(-[0-9]*)?$'")
                    ->latest('id')
                    ->pluck('slug')
                    ->first();

            if ($latestSlug) {
                $pieces = explode('-', $latestSlug);
                $number = intval(end($pieces));
                $project->slug = $project->slug . '-' . ($number + 1);
            }
        });

        static::updating(function($project) {
            $project->slug = str_slug($project->name);

            $latestSlug =
                static::whereRaw("slug RLIKE '^{$project->slug}(-[0-9]*)?$'")
                    ->latest('id')
                    ->pluck('slug')
                    ->first();

            if ($latestSlug) {
                $pieces = explode('-', $latestSlug);
                $number = intval(end($pieces));
                $project->slug = $project->slug . '-' . ($number + 1);
            }
        });
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
