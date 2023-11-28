<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'ClientName' => 'required|string|max:100',
            'phone' => 'required|numeric|regex:/^[0-9\s\-\(\)]{1,30}$/',
            'mail' => 'required|email',
            'CoachName' => 'nullable',
            'chosen_datetime' => [
                'nullable',
                'date',
                'after:now',
                Rule::unique('contacts', 'chosen_datetime')->ignore($id),
            ],
        ];
    }
    public function messages()
    {
        return [
            'ClientName.required' => 'Please Enter Your Name.',
            'ClientName.string' => 'Your Name Must Be Text.',
            'ClientName.max' => 'Max Length For Your Name Must Be Less Than 100.',
            'phone.required' => 'Please Enter Your Phone Number .',
            'phone.numeric' => 'Your Phone Number Must Be A Number.',
            'phone.max' => 'Max Length For Your Phone Number Must Be Less Than 30.',
            'mail.required' => 'Please Enter Your Email.',
            'mail.email' => 'It Is Not An Email Form (example@abc.key)',
            'CoachName.required' => 'Please Select Your Coach.',
            'chosen_datetime.required' => 'Please Enter Your Appointment.',
            'chosen_datetime.dateTime' => 'Your Appointment Must Be Date.',
            'chosen_datetime.unique' => 'This Date Is chosen Before.',
            'chosen_datetime.after' => 'Please Enter Valid Date .',
        ];
    }
}
