<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class AccountsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Account $account
     */
    protected $account;

    public function setUp()
    {
        parent::setUp();

        $this->account = factory(Account::class)->make();
    }

    /** @test */
    public function it_returns_an_empty_array_when_none_exists()
    {
        $response = $this->getJson('/api/accounts');

        $response->assertStatus(200)
            ->assertJson([]);
    }

    /** @test */
    public function it_returns_the_list_of_created_accounts()
    {
        $this->create_an_account();

        $this->get('/api/accounts')
            ->assertJson([
                [
                    "name" => $this->account->name,
                    "balance" => $this->account->balance,
                    "type" => $this->account->type,
                    "off_budget" => $this->account->off_budget,
                ]
            ]);
    }

    /** @test */
    public function it_creates_an_account_and_an_init_transaction()
    {
        $this
            ->create_an_account()
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                "name" => $this->account->name,
                "balance" => $this->account->balance,
                "type" => $this->account->type,
                "off_budget" => $this->account->off_budget,
            ]);

        $this
            ->get('/api/accounts/'. Account::first()->id.'/transactions')
            ->assertJson([
                [
                    'amount' => $this->account->balance
                ]
            ]);
    }

    /** @test */
    public function it_returns_validation_errors_when_it_is_called_for()
    {
        $this
            ->post('/api/accounts', array_merge(
                $this->account->toArray(),
                ['balance' => 'invalid value']
            ))
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    protected function create_an_account()
    {
        return $this->post('/api/accounts', $this->account->toArray());
    }

}
