<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  Auth::user();
        $transactions = $user->transactions;

        if ($transactions->count() == 0) {
            return response(['message' => "there is no transactions"]);
        };
        
        return TransactionResource::collection($transactions->take(5));
    }
}
