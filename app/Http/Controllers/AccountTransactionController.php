<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawRequest;
use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountTransactionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function withdraw(WithdrawRequest $request, Account $account)
    {
        $withdraw = $request->storeWithdraw();

        return response([
            'message' => __('withdraw.success'),
            'account' => new AccountResource($account)
        ]);
    }


    public function deposit(Request $request)
    {
        dd('out of scope till now');
    }
}
