<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'course_id' => 'required',
            'date_time' => 'required'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'date_time' => $this->input('date') . " " . $this->input('time')
        ]);
    }
}
