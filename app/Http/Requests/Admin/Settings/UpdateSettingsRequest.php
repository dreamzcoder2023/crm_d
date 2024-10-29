<?php

namespace App\Http\Requests\Admin\Settings;

use App\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSettingsRequest extends FormRequest
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
            'title' => ['required', 'string', Rule::unique(Settings::class, 'title')->ignore($this->settings)],
            'favicon' => 'nullable',
            'logo' => 'nullable',
            'sidebar_logo' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'sidebar_logo.nullable' => 'Sidebar Logo is nullable',
        ];
    }
}
