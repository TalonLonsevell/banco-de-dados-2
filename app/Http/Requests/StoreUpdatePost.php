<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->segment(2);

        $rules = [
            'title' => [
                'required',
                'min:3',
                'max:160',
                //"unique:posts,title,{$id},id",
                Rule::unique('posts')->ignore($id),
            ],
            'content' => ['nullable', 'min:5', 'max:10000'],
            'image' => ['required', 'image']
        ];

        if($this->method() == 'PUT') {
            $rules['image'] = ['nullable', 'image'];
        }

        return $rules;
    }
}
