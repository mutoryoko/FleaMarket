<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// テストケースID:1　会員登録機能
class Id1_RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_error_when_name_is_missing()
    {
        $response = $this->post(route('register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]));

        $response->assertSessionHasErrors(['name']);

        $this->get(route('register'))->assertSee('お名前を入力してください');
    }

    public function test_show_error_when_email_is_missing()
    {
        $response = $this->post(route('register', [
            'name' => 'test-user',
            'email' => '',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]));

        $response->assertSessionHasErrors(['email']);

        $this->get(route('register'))->assertSee('メールアドレスを入力してください');
    }

    public function test_show_error_when_password_is_missing()
    {
        $response = $this->post(route('register', [
            'name' => 'test-user',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => 'password',
        ]));

        $response->assertSessionHasErrors(['password']);

        $this->get(route('register'))->assertSee('パスワードを入力してください');
    }

    public function test_register_fails_with_short_password()
    {
        $response = $this->post(route('register', [
            'name' => 'test-user',
            'email' => 'test@example.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]));

        $response->assertSessionHasErrors(['password']);

        $this->get(route('register'))->assertSee('パスワードは8文字以上で入力してください');
    }

    public function test_register_fails_with_different_password()
    {
        $response = $this->post(route('register', [
            'name' => 'test-user',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password123',
        ]));

        $response->assertSessionHasErrors(['password']);

        $this->get(route('register'))->assertSee('パスワードと一致しません');
    }

    public function test_user_can_register()
    {
        $response = $this->post(route('register', [
            'name' => 'test-user',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]));

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        // メール機能ありのため、プロフィール設定画面から変更
        $response->assertRedirect('/email/verify');
    }
}
