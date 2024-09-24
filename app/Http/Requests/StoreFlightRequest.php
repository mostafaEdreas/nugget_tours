<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlightRequest extends FormRequest
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
        // dd($this->route('flight'));
        return [
            'name' => 'required|max:255|string|unique:flights,name,'. $this->flight?->id,
            'from_city' => 'required|max:255|string',
            'to_city' => 'required|max:255|string',
            'trip_date' => 'required|date_format:Y-m-d',
            'trip_time' => 'required',
        ];
    }
}
