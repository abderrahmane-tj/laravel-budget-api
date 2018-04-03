<?php

namespace Tests\Unit;

use App\Models\Transactions\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var $account Account
     */
    protected $account;

    public function setUp()
    {
        parent::setUp();

        $this->account = factory(Account::class)->create();
    }

    /**
     * @test
     */
    public function it_has_transactions()
    {
        $this->assertInstanceOf(Collection::class, $this->account->transactions);
    }
}
