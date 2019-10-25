<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Foundation\Testing\DatabaseTransactions;
class HomeControllerTest extends TestCase
{
    use DatabaseTransactions;
   // use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('index'));
        $response->assertViewIs('index');
    }

    public function testCreateUser()
    {
        $response = $this->call('POST',route('create.user'),[
            'name' => 'Test user name',
            'email' => 'testuser123@example.com',
            'password' => bcrypt('testuser123')
        ]);
       $this->assertDatabaseHas('users',[
          'name' => 'Test user name',
          'email' => 'testuser123@example.com'
       ]);
       $response->assertSessionHas('success','User created successfully');
    }

    public function testDeleteUser()
    {
        $response = $this->get(route('delete.user',['user_id' => 1]));
        $this->assertDatabaseMissing('users',[
            'name' => 'Dummy User',
            'email' => 'dummyuser123@example.com'
        ]);
        $response->assertSessionHas('success','User deleted successfully');
    }

    public function testQuestionCommand()
    {
        $this->artisan('question')
            ->expectsQuestion('What is your name?','Mr Test')
            ->expectsQuestion('Your favorite programming language?','PHP')
            ->expectsQuestion('Are you satisfied with your answers?','y')
            ->expectsOutput('Your name is Mr Test and your favorite programming language is PHP');
    }
}
