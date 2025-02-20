<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $sites = Site::all();

        foreach ($sites as $site) {
            Comment::factory(20)->create([
                'user_id' => $users->random()->id,
                'site_id' => $site->id,
            ]);
        }

        // Generate replies
        $comments = Comment::all();
        foreach ($comments as $comment) {
            if (rand(0, 1)) { // 50% chance of having a reply
                Comment::factory(5)->create([
                    'user_id' => $users->random()->id,
                    'site_id' => $comment->site_id,
                    'parent_id' => $comment->id,
                ]);
            }
        }
    }
}
