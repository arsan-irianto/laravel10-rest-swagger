<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
        $method = $this->method(); // PUT or PATCH

        if ($method == 'PUT') {
            return [
                'title'  => 'required|string|min:3|max:255',
                'body'   => 'required',
                'userId' => 'required',
            ];
        } else {
            return [
                'title'  => 'sometimes|required|string|min:3|max:255',
                'body'   => 'sometimes|required',
                'userId' => 'sometimes|required',
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->user_id) {
            $this->merge([
                'userId' => $this->user_id,
            ]);
        }
    }
}
