<?php

namespace Tests\Feature;

use Illuminate\Foundation\Auth\User;
use Tests\AbstractTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use  App\Http\Controllers\Auth\RegisterController;

class RegistrationTest extends AbstractTestCase
{
    private $name = 'Truelogin1';
    private $password = 'TruePassword1';

    /**
     * Тестирование регистрации с разными вариантоми данных
     *
     * @return void
     */
    public function testRegistration()
    {
        $requestParams = [
            [
                'return_adrr' => route('register.success'),
            ],
            [
                'name' => 'Fals.Login',
                'return_adrr' => route('register.register'),
            ],
            [
                'name' => '    ',
                'return_adrr' => route('register.register'),
            ],
            [
                'name' => '',
                'return_adrr' => route('register.register'),
            ],
            [
                'password' => 'NotRepPass',
                'password_confirmation' => '123123',
                'return_adrr' => route('register.register'),
            ],
            [
                'password' => 'smP1',
                'password_confirmation' => 'smP1',
                'return_adrr' => route('register.register'),
            ],
            [
                'password' => 'NotNumPas',
                'password_confirmation' => 'NotNumPas',
                'return_adrr' => route('register.register'),
            ],
            [
                'password' => '',
                'password_confirmation' => '',
                'return_adrr' => route('register.register'),
            ],
            [
                'password' => '   ',
                'password_confirmation' => '   ',
                'return_adrr' => route('register.register'),
            ],
        ];

        foreach ($requestParams as $param) {

            $param['name'] = $param['name'] ?? $this->name;
            $param['password'] = $param['password'] ?? $this->password;
            $param['password_confirmation'] = $param['password_confirmation'] ?? $this->password;

            $this->post(route('register.register'), $param)->assertLocation($param['return_adrr']);
            $user = User::where('name', $param['name']);
            if ($user->exists()) {
                $user->delete();
            }
        }
    }

    /**
     * Проверка на сохранения пользователя и на отказ в сохранении при уже существующей записи.
     *
     * @return void
     */

    public function testExistLogin()
    {
        $param = [
            'name' => $this->name,
            'password' => $this->password,
            'password_confirmation' => $this->password
        ];
        $this->post(route('register.register'), $param)->assertLocation(route('register.success'));
        $this->post(route('register.register'), $param)->assertLocation(route('register.register'));
        $user = User::where('name', $param['name']);
        $this->assertTrue($user->exists());
        if ($user->exists()) {
            $user->delete();
        }
    }
}