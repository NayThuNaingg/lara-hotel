<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Validation\Rule;
use App\Rules\CheckReservationAvailability;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckInDateBeforeCheckOutDate;

class reservationRequest extends FormRequest
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
            'room_id'  => ['required', 'integer', Rule::exists('rooms', 'id')],
            'checkin'  => ['required', 'date'],
            'checkout' => [
                            'required',
                            'date',
                            new CheckInDateBeforeCheckOutDate(),
                            new CheckReservationAvailability(
                                request('room_id'),
                                request('checkin'),
                                request('checkout'),
                            ),
            ],
            'name'  => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'room_id.required'  => 'Room ID is required',
            'checkin.required'  => 'Please Fill Checkin Date',
            'checkout.required' => 'Please Fill Checkout',
            'name.required'     => 'Please Fill Your Name',
            'email.required'    => 'Please Fill Your Email',
            'phone.required'    => 'Please Fill Your Phone'
        ];
    }
}
