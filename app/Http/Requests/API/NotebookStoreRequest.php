<?php
declare(strict_types=1);

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class NotebookStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return   [
            'title' => ['required', 'string', 'min:2', 'max:255'],
            'company' => ['sometimes', 'string'],
            'phone' => ['required', 'string', 'min:6', 'max:255',  Rule::unique('notebooks', 'phone')->ignore($this->id)],
            'email' => ['required', 'string', 'max:255', 'email', Rule::unique('notebooks', 'email')->ignore($this->id)],
            'birthday' => ['sometimes', 'date_format:Y-m-d'],
            'photo' => ['sometimes', 'string', 'max:255']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            'success' => false,
            'code' => 422,
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }
}

