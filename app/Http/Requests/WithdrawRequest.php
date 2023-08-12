<?php

namespace App\Http\Requests;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class WithdrawRequest extends FormRequest
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
    public function rules(): array
    {
        $enough_balance = function ($attribute, $value, $fail) {
            if ($this->account->balance < $this->amount) {
                $fail(__('withdraw.enough_balance'));
            }
        };

        $currency_availability = function ($attribute, $value, $fail) {
            if ($this->amount % 50 != 0) {
                $fail(__('withdraw.currency_not_available'));
            }
        };

        $daily_limit = function ($attribute, $value, $fail) {
            $daily_transactions_amount = Transaction::ofToday($this->account->id)->sum('amount');

            if ($daily_transactions_amount >= 10000) {
                $fail(__('withdraw.reach_daily_limit'));
            }

            if ($daily_transactions_amount + $this->amount  >= 10000) {
                $fail(__('withdraw.exceed_daily_limit'));
            }
        };

        return [
            'amount' => [
                'required',
                'integer',
                'between:50,1000',
                $enough_balance,
                $daily_limit,
                $currency_availability,
            ],

            'atm_id' => 'integer|exists:atms,id',
            'type_id' => 'integer|exists:transaction_types,id',

        ];
    }

    public function storeWithdraw()
    {
        return DB::transaction(function () {
            $this->transaction = Transaction::create([
                'account_id' => $this->account->id,
                'atm_id' => $this->atm_id,
                'type_id' => $this->type_id,
                'amount' => $this->amount,
                'balance_before' => $this->account->balance,
                'balance_after' => $this->account->balance - $this->amount,
            ]);

            $this->account->update([
                'balance' => $this->account->balance - $this->amount
            ]);
            return $this->account->refresh();
        });
    }

}
