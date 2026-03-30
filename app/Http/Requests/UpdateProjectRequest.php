<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'media' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,mp4,mov,avi', 'max:102400'],
            // kategori untuk penempatan section
            'category' => ['required', 'string', 'in:uiux,video,music,makeup'],
            'figma_link' => ['nullable', 'url'],
            'github_link' => ['nullable', 'url'],
            'live_link' => ['nullable', 'url'],
            'tiktok_link' => ['nullable', 'url'],
            'tags' => ['nullable', 'string', 'max:255'],
        ];
    }
}
