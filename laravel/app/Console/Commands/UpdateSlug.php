<?php

namespace App\Console\Commands;

use App\Models\PostModel;
use Illuminate\Console\Command;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class UpdateSlug extends Command
{
    protected $signature = 'update:slug';
    protected $description = 'Update all slag';

    public function handle(): void
    {
        $news = PostModel::all();
        $news->each(function (PostModel $new) {
            $slug = bin2hex(random_bytes(5));
            $new->slug = SlugService::createSlug(PostModel::class, 'slug', $slug);
            $new->save();
        });
    }
}
