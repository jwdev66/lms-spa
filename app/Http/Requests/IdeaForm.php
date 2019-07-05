<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaForm extends FormRequest
{

    public function authorize()
    {
        // $comment = Comment::find($this->route('comment'));
        // return $comment && $this->user()->can('update', $comment);
        return false;
    }


    public function rules()
    {
        return [
            'title' => 'required|unique:ideas|max:255',
            'body' => 'required',
        ];
    }

    public function messages()
{
    return [
        // 'title.required' => 'A title is required',
        // 'body.required'  => 'A message is required',
    ];
}
}
