<?php

namespace Tests\Unit;

use App\Models\Account;
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
