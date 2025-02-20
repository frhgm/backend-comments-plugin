<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\Comment;

class StoreCommentController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function __invoke(StoreCommentRequest  $request)
    {
        $domain = parse_url($request->header('referer') ?? $request->url(), PHP_URL_HOST);

        // Get or create the site
        $site = Site::firstOrCreate(
            ['url' => $domain],
            ['name' => ucfirst(str_replace(['www.', '.com', '.net', '.org'], '', $domain))]
        );

        // Get a random user (or create one if none exist)
        // $user = User::inRandomOrder()->first() ?? User::factory()->create();

        // Create the comment and associate it with the site
        $comment = Comment::create([
            // 'user_id' => $user->id, //TODO: Capturar usuario de extension
            'site_id' => $site->id,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'Comment created successfully!',
            'site' => $site,
            'comment' => $comment,
        ]);
    }
}
