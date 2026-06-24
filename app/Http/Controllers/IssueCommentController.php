<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Comment;
use Illuminate\Http\Request;

class IssueCommentController extends Controller
{
    public function store(Request $request, Issue $issue)
    {
        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $issue->comments()->create($validated);

        return redirect()
            ->route('issues.show', $issue)
            ->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $issue = $comment->issue;

        $comment->delete();

        return redirect()
            ->route('issues.show', $issue)
            ->with('success', 'Comment deleted successfully.');
    }
}