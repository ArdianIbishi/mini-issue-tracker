<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $tags = Tag::latest()->get();

    return view('tags.index', compact('tags'));
}

   
    public function store(StoreTagRequest $request)
    {
        Tag::create($request->validated());
    
        return redirect()
            ->route('tags.index')
            ->with('success', 'Tag created successfully.');
    }


  


   
}
