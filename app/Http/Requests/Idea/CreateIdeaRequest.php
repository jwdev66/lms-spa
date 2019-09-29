<?php

namespace App\Http\Requests\Idea;

use App\Models\Idea\Idea;
use Illuminate\Foundation\Http\FormRequest;

class CreateIdeaRequest extends FormRequest
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
        return Idea::$rules;
    }
}
