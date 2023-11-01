<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseTest extends TestCase
{
    public function test_database_connection(): void
    {
        // try to make a connection and return the result
        try {
            DB::connection()->getPdo();
            $result = true;
        } catch (\Exception $e) {
            $result = false;
        }

        // check if the result is true or not
        $this->assertTrue($result, 'Failed to connect to the database.');
    }

    public function test_can_insert_user_using_user_model(): void
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

        $user = User::where('name', 'test')->first();
        if($user) {
            $result = true;
            $user->delete();
        } else {
            $result = false;
        }

        $this->assertTrue($result, 'Failed to insert user using User model');
    }

    // public function test_can_insert_user_using_sql_query(): void
    // {
    //     // make sure the test user doesn't exist
    //     $user = User::where('name', 'test')->first();
    //     if($user) {
    //         $user->delete();
    //     }

    //     // create a test user for testing
    //     DB::table('users')->insert(['name' => 'test', 'email' => 'test@example.com', 'pass_word' => md5('password')]);

    //     $user = User::where('name', 'test')->first();
    //     if($user) {
    //         $result = true;
    //         $user->delete();
    //     } else {
    //         $result = false;
    //     }

    //     $this->assertTrue($result, 'Failed to insert user using SQL query');
    // }

    public function test_can_delete_user_using_user_model(): void
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

        // get and delete the user
        $user = User::where('name', 'test')->first();
        $user->delete();

        // check if the user is gone
        $user = User::where('name', 'test')->first();
        if(!$user) {
            $result = true;
        } else {
            $user->delete();
            $result = false;
        }

        $this->assertTrue($result, 'Failed to delete user using User model');
    }

    public function test_can_update_user_using_user_model(): void
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

        // get and delete the user
        $user = User::where('name', 'test')->first();
        $user->update(['email' => "new@example.com"]);

        // check if the user is updated
        $user = User::where('email', 'new@example.com')->first();
        if($user) {
            $result = true;
            $user->delete();
        } else {
            $result = false;
        }

        $this->assertTrue($result, 'Failed to delete user using User model');
    }
}
