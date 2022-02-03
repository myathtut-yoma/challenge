<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\PostReactionRequest;
use App\Http\Resources\PostResource;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends Controller
{
    use ResponseTrait;

    public function list()
    {
        return PostResource::collection(Post::get())->additional(['message' => 'Get All posts', 'code' => Response::HTTP_OK]);
    }

    public function toggleReaction(PostReactionRequest $request)
    {
        $like = Like::likePost($request->post_id)->first();
        $isPostUnlike = $like && $like->post_id == $request->post_id && !$request->like ? true : false;

        if ($isPostUnlike) {
            $like->delete();
            return $this->successResponse('You unlike this post successfully');

        }

        if ($request->like) {
            Like::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->id()
            ]);
            return $this->successResponse('You like this post successfully');
        }

        return $this->errorResponse('Something wrong');

    }
}
