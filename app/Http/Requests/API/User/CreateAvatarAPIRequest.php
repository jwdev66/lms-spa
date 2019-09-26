<?php

namespace App\Http\Requests\API\User;

use App\Models\User\Avatar;
use InfyOm\Generator\Request\APIRequest;

class CreateAvatarAPIRequest extends APIRequest
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
        return Avatar::$rules;
    }
}
