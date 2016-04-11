<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuthUser()
    {
        $this->assertTrue(Auth::attempt(['username' => 'Mirigan', 'password' => 'secret']));
        Auth::logout();
    }

    public function testGetUsernameAuthUser()
    {
        Auth::attempt(['username' => 'Mirigan', 'password' => 'secret']);
        $this->assertTrue(Auth::user()->username == 'Mirigan');
        Auth::logout();
    }

    public function testCheckCheckTrue()
    {
        Auth::attempt(['username' => 'Mirigan', 'password' => 'secret']);
        $this->assertTrue(Auth::check());
        Auth::logout();
    }

    public function testCheckGuestFalse()
    {
        Auth::attempt(['username' => 'Mirigan', 'password' => 'secret']);
        $this->assertFalse(Auth::guest());
        Auth::logout();
    }

    public function testLoginForm()
    {
        $this->visit('/auth/login')
            ->type('Mirigan', 'username')
            ->type('secret', 'password')
            ->press('Connexion');
        $this->assertTrue(Auth::check());
        Auth::logout();
    }
}
