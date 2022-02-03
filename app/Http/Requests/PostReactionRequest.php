<?php

namespace App\Http\Requests;

use App\Rules\LikeRule;
use App\Rules\PostOwner;
use Illuminate\Foundation\Http\FormRequest;

class PostReactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'post_id' => ['required', 'int', 'exists:posts,id', new PostOwner(request()->get('post_id'))],
            'like' => ['required', 'boolean', new LikeRule(request()->get('post_id'))]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
