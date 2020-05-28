<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MypageRequest extends FormRequest
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
            'clinic.name' => [
                'required',
                'string',
                'max:255'
            ],
            'clinic.prefecture_id' => [
                'required',
                'integer',
            ],
            'review.start' => [
                'required',
                'date',
            ],
            'review.end' => [
                'required',
                'date',
            ],
            'twitter' => [
                'nullable',
                'url',
            ],
            'instagram' => [
                'nullable',
                'url',
            ],
            'review.review' => [
                'nullable',
                'string',
                'max:3000'
            ]
        ];
    }
}
