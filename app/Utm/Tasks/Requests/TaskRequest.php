<?php

namespace App\Utm\Tasks\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TaskRequest
 * @package App\Utm\Tasks\Requests
 */
class TaskRequest extends FormRequest
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
        if (!$this->task) {
            return [
                "name" => ['required', 'string'],
                'start_date' => ['required', 'date'],
                "conclusion_date" => ['nullable', 'date'],
                "status" => ['required', 'string'],
            ];
        }

        return [
            "name" => ['required', 'string'],
            'start_date' => ['nullable', 'date'],
            "conclusion_date" => ['required', 'date'],
            "status" => ['required', 'string'],
        ];
    }
}
