<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Models\Content;
use App\Models\WatchSession;
use App\Services\TheCatApi\CatImageRequest;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Get the data of the current page.
     */
    public function getPageData()
    {
        return config('kitflix.pages.' . request()->route()->getName());
    }

    /**
     * Display a listing of the resource for the homepage.
     */
    public function home(Request $request)
    {
        $page = $this->getPageData();
        $page['hero'] = Content::find(rand(1, 50));
        $page['video_sections'] = [];

        // get an overview of saved items of the user
        if ($user = $request->user()) {
            $page['video_sections'][] = [
                'title'  => __('My List'),
                'videos' => $user->myList,
            ];
        }

        // get a select number of genres (possibly dynamic in the future)
        foreach ([Genre::DRAMA, Genre::COMEDY] as $genre) {
            $page['video_sections'][] = [
                'title'  => $genre->value,
                'videos' => Content::whereGenre($genre)->get(),
            ];
        }

        // insert a top 10 overview of popular films
        $page['video_sections'][] = [
            'count'  => true,
            'title' => __('Top 10 TV Shows in Belgium Today'),
            'videos' => Content::popular(10)->get()
        ];

        // add another few genres (possibly dynamic in the future)
        foreach ([Genre::ADVENTURE, Genre::DOCUMENTARY, Genre::CRIME, Genre::ROMANCE] as $genre) {
            $page['video_sections'][] = [
                'title'  => $genre->value,
                'videos' => Content::whereGenre($genre)->get(),
            ];
        }

        return view('content.home', $page);
    }

    /**
     * Display a listing of the resource for the genres page.
     */
    public function genres(Request $request)
    {
        $page = $this->getPageData();

        foreach ([Genre::ACTION, Genre::ADVENTURE, Genre::DRAMA, Genre::COMEDY, Genre::FANTASY] as $genre) {
            $page['video_sections'][] = [
                'title'  => $genre->value,
                'videos' => Content::whereGenre($genre)->get(),
            ];
        }

        return view('content.genres', $page);
    }

    /**
     * Display a listing of the resource for the user's personal page.
     */
    public function my_list(Request $request)
    {
        $page = $this->getPageData();
        
        $page['videos'] = $request->user()->myList;

        return view('content.my-list', $page);
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
