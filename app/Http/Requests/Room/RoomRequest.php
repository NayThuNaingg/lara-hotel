<?php

namespace App\Http\Requests\Room;

use Illuminate\Validation\Rule;
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
            'name' => ['required', 'string', Rule::unique('rooms', 'name')->whereNull('deleted_at')],
            'occupancy' => ['required', 'integer'],
            'bed_id' => ['required', 'integer'],
            'size' => ['required', 'integer'],
            'view_id' => ['required', 'integer'],
            'price_per_day' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'extra_bed_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'specialFeature' => ['required', 'array'],
            'amenity' => ['required', 'array'],
            'detail' => ['required', 'string'],
            'description' => ['required', 'string'],
            'thumbnail' => ['required', 'file', 'mimes:jpg,png,gif,jpeg'],
        ];

    }

    public function messages()
    {
        return [
            'name.required'           => 'Please fill Room Name',
            'name.unique'             => 'This name is already exit',
            'occupancy.required'      => 'Please fill Room Occupancy',
            'bed_id.required'         => 'Please choose Bed Type',
            'size.required'           => 'Please fill Room Size',
            'view_id,required'        => 'Please choose Room View',
            'price_per_day.required'  => 'Please fill Price Per Day',
            'extra_bed_price'         => 'Please fill extra bed price',
            'specialFeature.array'    => 'Please Choose Special Feature',
            'specialFeature.required' => 'Please Choose Special Feature',
            'amenity.array'           => 'Please choose Amenity',
            'amenity.required'        => 'Please choose Amenity',
            'detail.required'         => 'Please fill Room Detail',
            'description.required'    => 'Please fill Room Description',
            'thumbnail.required'      => 'Please fill Room Image',
            'thumbnail.mimes'         => 'This room image is must be JPG, PNG, GIF, JEPG',
        ];
    }
}
