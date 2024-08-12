<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    public function fetchIdeas(Request $request)
    {
        $page = $request->input('page', 1);
        $size = $request->input('size', 10);
        $sort = $request->input('sort', '-published_at');
    
        $response = Http::withHeaders([
            'accept' => 'application/json'
        ])->get('https://suitmedia-backend.suitdev.com/api/ideas', [
            'page[number]' => $page,
            'page[size]' => $size,
            'append' => ['small_image', 'medium_image'],
            'sort' => $sort,
        ]);
    
        $articles = $response->json()['data'];
        $meta = $response->json()['meta'];
        $links = $response->json()['links'];
    
        return view('index', [
            'articles' => $articles,
            'meta' => $meta,
            'links' => $links
        ]);
    }    
}