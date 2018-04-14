<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var $account Account
     */
    protected $account;

    public function setUp()
    {
        parent::setUp();

        $this->account = factory(Account::class)->make();
    }

    /**
     * @test
     */
    public function it_has_transactions()
    {
        $this->assertInstanceOf(Collection::class, $this->account->transactions);
    }

    /**
     * @test
     */
    public function it_creates_a_transaction_that_initializes_balance()
    {
        $this->account->save();

        // creating an account creates a transaction
        $this->assertEquals(1, $this->account->transactions->count());

        // the created transaction, has an amount equal to the account
        /**
         * @var Transaction $transaction
         */
        $transaction = $this->account->transactions->first();
        $this->assertEquals($this->account->balance, $transaction->amount);

    }
}
