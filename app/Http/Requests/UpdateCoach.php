<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCoach extends FormRequest
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
            'id'    => 'required',
            'coach_name' => 'required|min:5|max:25|unique:coaches,coach_name,'.$this->id,
            'type' => 'required|unique:coaches,type,team',
            'team' => 'required|unique:coaches,team',
        ];
    }
}
