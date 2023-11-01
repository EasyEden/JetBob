<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\User;

class AuthControllerTest extends TestCase
{
    public function test_registered_successfully(): void
    {
        // make sure the test user doesn't exist
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }

        // data for request
        $requestData = [
            'username' => 'test',
            'email' => 'test@example.com',
            'password' => 'password',
            'confirmPassword' => 'password',
        ];

        // route
        $response = $this->post(route('register'), $requestData);

        // check if the function returns the /login
        $response->assertRedirect('/login')->assertSessionHas('msg', 'Registered Successfully! You can now log in to your new account!');

        // check if the new user is in the users table
        $this->assertDatabaseHas('users', [
            'name' => 'test',
            'email' => 'test@example.com',
        ]);

        // get the new test user and delete it
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }
    }

    public function test_registration_returns_404_with_invalid_data(): void
    {
        // make sure the test user doesn't exist
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }

        // Data for request
        $invalidData = [
            'username' => 'test',
            'email' => 'test@example.com',
            'password' => 'password',
            'confirmPassword' => 'wrongpassword', // <- invalid data
        ];

        // route
        $response = $this->post(route('register'), $invalidData);

        // Checking if the function returns a 404 as expected
        $response->assertStatus(404);
    }

    public function test_user_can_login_with_correct_login_information(): void
    {
        // make sure the test user doesn't exist
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }

        // create a test user for testing
        $user = new User();
        $user->name = "test";
        $user->email = "test@example.com";
        $user->pass_word = hash('md5', 'password');
        $user->save();

        // set the login information with correct login information
        $loginInformation = [
            'username' => 'test',
            'password' => 'password',
        ];

        // route to login with data
        $response = $this->post(route('login'), $loginInformation);

        // check if the function return you to "/" with the username
        $response->assertRedirect('/')->assertSessionHas('user', 'test');;

        // get the new test user and delete it
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }
    }

    public function test_user_cannot_login_with_incorrect_password(): void
    {
        // make sure the test user doesn't exist
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }

        // create a test user for testing
        $user = new User();
        $user->name = "test";
        $user->email = "test@example.com";
        $user->pass_word = hash('md5', 'password');
        $user->save();

        // set the login information with correct login information
        $falseLoginInformation = [
            'username' => 'test',
            'password' => 'wrongpassword',
        ];

        // Attempt to login with incorrect credentials
        $response = $this->post(route('login'), $falseLoginInformation);

        // Checking if the function returns a 404 as expected
        $response->assertStatus(404);

        // get the new test user and delete it
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }
    }

    public function test_user_cannot_login_with_non_existing_username(): void
    {
        // make sure the test user doesn't exist
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }

        // create a test user for testing
        $user = new User();
        $user->name = "test";
        $user->email = "test@example.com";
        $user->pass_word = hash('md5', 'password');
        $user->save();

        // set the login information with correct login information
        $falseLoginInformation = [
            'username' => 'wrongtest',
            'password' => 'password',
        ];

        // Attempt to login with incorrect credentials
        $response = $this->post(route('login'), $falseLoginInformation);

        // Checking if the function returns a 404 as expected
        $response->assertStatus(404);

        // get the new test user and delete it
        $user = User::where('name', 'test')->first();
        if($user) {
            $user->delete();
        }
    }
}
