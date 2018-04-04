<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Transactions\Account;
use Illuminate\Http\Response;

class AccountsController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function store(CreateAccountRequest $request)
    {
        dd('lol');
        $account = Account::create($request->all());
        return response()->json($account, Response::HTTP_CREATED);
    }

    public function update(Account $account)
    {

    }
}