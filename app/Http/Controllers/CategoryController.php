<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Response as ResponseHttp;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as ResponseInertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResponseInertia
     */
    public function index(): ResponseInertia
    {
        $data = Category::all()->where('user_id', Auth::user()->id);

        return Inertia::render('categories',[
           'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return ResponseHttp
     */
    public function store(StoreCategoryRequest $request): ResponseHttp
    {
        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->validated('name'),
        ]);

        return redirect()->back()
            ->with('message', 'Category created');
    }
}
