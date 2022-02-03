<?php

namespace App\Rules;

use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class PostOwner implements Rule
{
    private $postId;

    /**
     * Create a new rule instance.
     *
     * @param $postId
     */
    public function __construct($postId)
    {
        $this->postId = $postId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $post = Post::find($this->postId);
        if ($post->author_id == auth()->id()){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot like your post';
    }
}
