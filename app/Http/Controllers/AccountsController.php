<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Response;

class AccountsController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function store(CreateAccountRequest $request)
    {
        return response()->json(
          Account::create($request->all()),
          Response::HTTP_CREATED
        );
    }

    public function update(Account $account, UpdateAccountRequest $request)
    {
        return tap($account)->update($request->all());
    }
}