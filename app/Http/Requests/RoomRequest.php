<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'reference' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
            'description' => 'required|string',
            'availability' => 'required|string|in:available,not available',
            'number_of_beds' => 'required|integer|min:1',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric|min:0',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|numeric|between:0,5',
            'room_offers' => 'nullable|array',
            'room_offers.*' => 'exists:room_offers,id',
        ];
    }
    public function messages()
    {
        return [
            'hotel_id.required' => "Hotel is required",
            'room_type_id.required' => "Room type is required",
            'room_offers.*.exists' => "Invalid room offer selected",
        ];
    }
}
