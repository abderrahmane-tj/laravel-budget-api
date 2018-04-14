<?php

namespace App\Http\Controllers;


use App\Models\Account;

class TransactionsController extends Controller
{
    public function index(Account $account)
    {
        return $account->transactions;
    }
}
