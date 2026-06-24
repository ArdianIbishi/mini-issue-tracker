<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use App\Models\Tag;
use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;


class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Issue::with(['project', 'tags']);
    
        if (request('status')) {
            $query->where('status', request('status'));
        }
    
        if (request('priority')) {
            $query->where('priority', request('priority'));
        }
    
        if (request('tag')) {
            $query->whereHas('tags', function ($q) {
                $q->where('tags.id', request('tag'));
            });
        }
    
        $issues = $query
            ->latest()
            ->get();
    
        $tags = Tag::orderBy('name')->get();
    
        return view(
            'issues.index',
            compact('issues', 'tags')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::orderBy('name')
            ->get();
    
        return view('issues.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        Issue::create(
            $request->validated()
        );
    
        return redirect()
            ->route('issues.index')
            ->with(
                'success',
                'Issue created successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        $issue->load([
            'project',
            'tags',
            'comments' => function ($query) {
                $query->latest();
            }
        ]);

        $availableTags = Tag::whereNotIn(
            'id',
            $issue->tags->pluck('id')
        )->orderBy('name')->get();
    
    
        return view(
            'issues.show',
            compact('issue', 'availableTags')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $projects = Project::orderBy('name')->get();
    
        return view(
            'issues.edit',
            compact('issue', 'projects')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateIssueRequest $request,
        Issue $issue
    )
    {
        $issue->update(
            $request->validated()
        );
    
        return redirect()
            ->route('issues.show', $issue)
            ->with(
                'success',
                'Issue updated successfully.'
            );
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
    
        return redirect()
            ->route('issues.index')
            ->with(
                'success',
                'Issue deleted successfully.'
            );
    }
}
