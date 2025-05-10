<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Models\Content;
use App\Services\TheCatApi\CatImageRequest;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CatImageRequest $cat_image)
    {
        $page = config('kitflix.pages.' . $request->route()->getName());

        // TODO: use bulk import of images to avoid many API calls
        // this can be done using the limit function and caching

        $page['hero'] = [
            'image'   => $cat_image->fallback()->first(),
            'content' => Content::find(rand(1, 50)),
        ];

        $page['video_sections'] = [];

        if ($request->routeIs('home')) {
            if ($user = $request->user()) {
                $page['video_sections'][] = [
                    'title'  => __('My List'),
                    'videos' => $user->myList,
                ];
            }
            foreach ([Genre::ADVENTURE, Genre::DRAMA, Genre::COMEDY] as $genre) {
                $page['video_sections'][] = [
                    'title'  => $genre->value,
                    'videos' => Content::whereGenre($genre)->get(),
                ];
            }
        }

        if ($request->routeIs('genres')) {
            foreach ([Genre::ACTION, Genre::ADVENTURE, Genre::DRAMA, Genre::COMEDY, Genre::FANTASY] as $genre) {
                $page['video_sections'][] = [
                    'title'  => $genre->value,
                    'videos' => Content::whereGenre($genre)->get(),
                ];
            }
        }

        if ($request->routeIs('my-list')) {
            if ($user = $request->user()) {
                $page['video_sections'][] = [
                    'title'  => __('My List'),
                    'videos' => $user->myList,
                ];
            }
        }

        return view('content.index', $page);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
