<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function registered_users_can_login()
    {
        $user = User::factory()->create([
            'email' => 'user@mail.com'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'user@mail.com')
                    ->type('password', 'password')
                    ->press('#login-btn')
                    ->assertPathIs('/')
                    ->assertAuthenticated();
        });
    }
}
