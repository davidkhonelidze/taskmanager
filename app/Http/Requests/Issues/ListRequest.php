<?php

namespace App\Http\Requests\Issues;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'page' => 'integer|min:1',
            'status_id' => 'integer|min:1|nullable',
            'priority_id' => 'integer|min:1|nullable',
            'tracker_id' => 'integer|min:1|nullable',
        ];

        /*
         * I didn't use here more detailed validations coz of it's an assignment project
         * In a real life project I would use validations according to business logic of a redmine
         */
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);

        // Remove empty value keys
        $filteredData = array_filter($data, function ($value) {
            return $value !== '' && $value !== null;
        });

        return $filteredData;
    }
}
