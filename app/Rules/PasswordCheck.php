<?php

namespace App\Rules;

use App\Http\Helpers\ResponseTrait;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class PasswordCheck implements Rule
{
    use ResponseTrait;
    private $email;

    /**
     * Create a new rule instance.
     *
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
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
        $user = User::user($this->email)->first();

        if (!Hash::check($value, $user->password)) {
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
        return 'Invalid credentials';
    }
}
