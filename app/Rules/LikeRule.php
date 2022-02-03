<?php

namespace App\Rules;

use App\Models\Like;
use Illuminate\Contracts\Validation\Rule;

class LikeRule implements Rule
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


        $like = Like::where('post_id', $this->postId)->where('user_id', auth()->id())->first();
        if ($like && $like->post_id == $this->postId && $value) {
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
        return 'You already liked this post';
    }
}
