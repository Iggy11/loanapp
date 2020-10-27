<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankAccountCollection;
use App\Http\Resources\BankAccountResource;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{

    public function index(Request $request, $user_id)
    {
        $user = auth()->user();

        //$bankAccounts =  BankAccountResource::collection($user->bankAccounts);

        $bankAccounts =  new BankAccountCollection($user->bankAccounts);

        //dd($bankAccounts);
        return $bankAccounts;

    }

}
