<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Tag;
use Illuminate\Http\Request;

class IssueTagController extends Controller
{
    public function store(Request $request, Issue $issue)
    {
        $validated = $request->validate([
            'tag_id' => ['required', 'exists:tags,id'],
        ]);

        $issue->tags()->syncWithoutDetaching([
            $validated['tag_id']
        ]);

        return redirect()
            ->route('issues.show', $issue)
            ->with('success', 'Tag attached successfully.');
    }

    public function destroy(Issue $issue, Tag $tag)
    {
        $issue->tags()->detach($tag->id);

        return redirect()
            ->route('issues.show', $issue)
            ->with('success', 'Tag detached successfully.');
    }
}