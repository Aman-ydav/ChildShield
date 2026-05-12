<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'child_name' => $this->child_name ? trim(strip_tags($this->child_name)) : null,
            'location' => $this->location ? trim(strip_tags($this->location)) : null,
            'description' => $this->description ? trim(strip_tags($this->description)) : null,
            'reporter_contact' => $this->reporter_contact ? trim(strip_tags($this->reporter_contact)) : null,
            'gender' => $this->gender ? Str::lower(trim($this->gender)) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'child_name' => ['nullable', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1', 'max:17'],
            'gender' => ['required', 'in:male,female,other,prefer_not_to_say'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:20', 'max:5000'],
            'reporter_contact' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}