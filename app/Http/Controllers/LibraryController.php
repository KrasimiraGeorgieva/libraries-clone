<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Inertia\Response;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $response = Http::get('https://libraries.io/api/search?languages=PHP&sort=latest_release_published_at&api_key=APIKEY');

        return Inertia::render('libraries',[
            'libraries' => $response->collect()
            ]);
    }
}
