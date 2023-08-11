<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountSimpleResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::paginate(5);
        return AccountSimpleResource::collection($accounts);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
