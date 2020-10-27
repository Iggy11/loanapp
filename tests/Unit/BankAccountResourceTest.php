<?php

namespace Tests\Unit;

use App\Http\Resources\BankAccountResource;
use App\Models\BankAccount;
use Database\Factories\BankAccountsFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Foundation\Testing\DatabaseMigrations;

//use PHPUnit\Framework\TestCase;
//use Tests\CreatesApplication;
use Tests\TestCase;

class BankAccountResourceTest extends TestCase
{

   use RefreshDatabase;


    public function test_resource_returns_correct_data()
    {

        $bankAccount = new BankAccount();
        $bankAccount->user_id = 1;
        $bankAccount->account_id = 'asda123';
        $bankAccount->account_type = 'checking';
        $bankAccount->balance = 11000;
        $bankAccount->bank_name = 'BOFA';
        $bankAccount->created_at = now();
        $bankAccount->updated_at = now();

        //make resource
        $resource = (new BankAccountResource($bankAccount))->jsonSerialize();

        $this->assertSame($bankAccount->account_id, $resource['account_id']);
      //  dd($resource['account_id']);
    }
}
