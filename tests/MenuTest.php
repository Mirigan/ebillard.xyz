<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuTest extends TestCase
{
    /**
     * Test link blog.
     *
     * @return void
     */
    public function testLinkBlog()
    {
        $this   ->visit('/')
                ->click('Blog')
                ->seePageIs('/blog');
    }

    /**
     * Test link login.
     *
     * @return void
     */
    public function testLinkLogin()
    {
        $this   ->visit('/')
                ->click('Sign In')
                ->seePageIs('/auth/login');
    }

    /**
     * Test link Home.
     *
     * @return void
     */
    public function testLinkHome()
    {
        $this   ->visit('/')
                ->click('Home')
                ->seePageIs('/');
    }


}
