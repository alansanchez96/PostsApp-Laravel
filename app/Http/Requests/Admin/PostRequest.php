<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string',
            'slug' => "required|unique:posts,slug,{$this->id}",
            'status' => 'required|in:1,2'
        ];

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required|integer',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
                'file' => 'image'
            ]);
        }

        return $rules;
    }
}
