<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
                'postId' => 'required',
                'userId' => 'required',
                'body'   => 'required',
            ];
        } else {
            return [
                'postId' => 'sometimes|required',
                'userId' => 'sometimes|required',
                'body'   => 'sometimes|required',
            ];
        }
    }
}
