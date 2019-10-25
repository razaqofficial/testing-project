<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    public function testLogin()
    {
        $response = $this->call('POST',route('login'),[
            'email' => 'dummyuser123@example.com',
            'password' => 'dummyuser123',
        ]);
       // $response->dump();
        $user = User::where('email','dummyuser123@example.com')->first();
        $this->assertAuthenticatedAs($user,'web');
        $response->assertRedirect(route('index'));
    }
}
