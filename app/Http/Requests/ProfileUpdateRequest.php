<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
{
    \Log::info('Received area value:', ['area' => $this->input('area')]);

    return [
        'name' => ['string', 'max:255'],
        'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        'owner' => ['boolean'],
        'picture' => ['file', 'max:500', 'nullable'],
        'explain' => ['string', 'max:300', 'nullable'],
        'area' => ['nullable', Rule::in(['east', 'west', 'islands'])],

        'sns' => ['string', 'max:100', 'nullable'],
    ];
}

}
