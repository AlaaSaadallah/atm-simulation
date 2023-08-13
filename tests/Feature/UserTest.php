<?php

namespace Tests\Feature;

use App\Http\Requests\SigninRequest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate');
        $this->artisan('passport:install');
        $this->artisan('db:seed');

        $this->withoutExceptionHandling();
        $this->customer = User::factory()->create(['is_blocked'=>false]);

    }

    /** ********** MAIN FUNCTIONS***************
     * 1-sign in functions ✓✓
     * 2-sign out functions ✓✓
     **/

    public function test_signin_functions()
    {
        $this->existance_of_endpoint('signin');
        $this->signin_validation_rules_existance();
        $this->signin_api_response_structure();
    }

    public function test_signOut_functions()
    {
        $this->existance_of_endpoint('signout');
    }

    public function existance_of_endpoint(string $routeName)
    {
        $route = Route::has($routeName);

        $this->assertTrue($route);
    }

    // Signin Functions
    public function signin_validation_rules_existance()
    {
        $request = new SigninRequest();

        $this->user = User::where('card_number', request()->card_number)->first();

        $blockRule = function ($attribute, $value, $fail) {
            if ($this->user?->is_blocked) {
                $fail(__('auth.blocked_card'));
            }
        };

        $hashPin = function ($attribute, $value, $fail) {
            if (!Hash::check($value, $this->user?->pin)) {
                $fail(__('auth.wrong_credentials'));
            }
        };

        $this->assertEquals([
            'card_number' => [
                'required',
                'numeric',
                'min:14',
                $blockRule,
            ],
            'pin' => [
                'required',
                'numeric',
                'min:6',
                $hashPin
            ],

        ], $request->rules());
    }

    public function signin_api_response_structure()
    {
        $response = $this->postJson('/api/signin', [
            'card_number' => $this->customer->card_number,
            'pin' => '123456'
        ]);

        $response->assertStatus(200)->assertJsonStructure([
            'message',
            'access_token',
            'user' => [
                'id',
                'first_name',
                'last_name',
                'phone',
                'address',
                'email',
                'card_number',
                'accounts'

            ]
        ]);
    }
}
