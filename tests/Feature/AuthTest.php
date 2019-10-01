<?php


namespace Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Tests\AbstractTestCase;

class AuthTest extends AbstractTestCase
{

    /**
     * Проверка авторизации существующего пользователя.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->post(route('login.login'));
        $response->assertRedirect('/home');
    }

    /**
     * Проверка авторизации не существующего пользователя.
     *
     * @return void
     */
    public function testNotExistLogin()
    {
        $response = $this->from(route('login.login'))->post(route('login.login'), [
            'name' => 'Test',
            'password' => 'Test',
        ]);
        $response->assertRedirect(route('login.login'));
    }
}