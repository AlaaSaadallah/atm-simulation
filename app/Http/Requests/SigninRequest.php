<?php

namespace App\Http\Requests;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SigninRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $this->user = User::where('card_number', $this->card_number)->first();


        $blockRule = function ($attribute, $value, $fail) {
            if ($this->user?->is_blocked) {
                $fail(__('auth.blocked_card'));
            }
        };

        $hashPin = function ($attribute, $value, $fail) {
            if (!Hash::check($value, $this->user?->pin)) {
                $fail(__('auth.wrong_credentials'));
            }
        };

        return [
            'card_number' => [
                'required',
                'numeric',
                'min:14',
                $blockRule,
            ],
            'pin' => [
                'required',
                'numeric',
                'min:6',
                $hashPin
            ],
        ];
    }

    public function signin()
    {
        return DB::transaction(function () {
            $this->user->update([
                'last_login_at' => Carbon::now(),
            ]);
            return $this->user->refresh();
        });
    }
}
