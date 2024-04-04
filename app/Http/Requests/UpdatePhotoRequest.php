<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoRequest extends FormRequest
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
                'albumId'      => 'required',
                'title'        => 'required|string|min:3|max:255',
                'url'          => 'required',
                'thumbnailUrl' => 'required',
            ];
        } else {
            return [
                'albumId'      => 'required',
                'title'        => 'sometimes|required|string|min:3|max:255',
                'url'          => 'required',
                'thumbnailUrl' => 'required',
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'album_id'      => $this->albumId,
            'thumbnail_url' => $this->thumbnailUrl,
        ]);
    }
}
