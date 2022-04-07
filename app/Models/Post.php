<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $excerpt;
    public $title;
    public $body;
    public $date;
    public $slug;

    /**
     * @param $excerpt
     * @param $title
     * @param $body
     * @param $date
     */
    public function __construct($excerpt, $title, $body, $date, $slug)
    {
        $this->excerpt = $excerpt;
        $this->title = $title;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }

    /**
     * @param $slug
     * @return mixed
     * @throws \Exception
     */
    public static function find($slug)
    {
       return static::all()->firstWhere('slug', $slug);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function all()
    {
        return cache()->rememberForever('posts.all', function (){
            return collect(File::files(resource_path('posts')))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($doc) {
                    return new Post($doc->excerpt, $doc->title, $doc->body(), $doc->date, $doc->slug);
                })
                ->sortByDesc('date');
        });
    }
}
