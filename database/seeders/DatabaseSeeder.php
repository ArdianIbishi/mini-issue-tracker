<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Issue;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Tag::factory(15)->create();

        Project::factory(10)
            ->create()
            ->each(function ($project) {

                $issues = Issue::factory(5)
                    ->for($project)
                    ->create();

                $issues->each(function ($issue) {

                    $issue->tags()->attach(
                        Tag::inRandomOrder()
                            ->take(rand(1, 3))
                            ->pluck('id')
                    );

                    Comment::factory(rand(2, 5))
                        ->for($issue)
                        ->create();
                });
            });
    }
}