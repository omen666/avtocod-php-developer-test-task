<?php


namespace Tests\Feature;

use App\Models\Messages;
use Illuminate\Foundation\Auth\User;
use Tests\AbstractTestCase;
use Faker\Factory as Faker;

class MessageTest extends AbstractTestCase
{
    private $user;
    private $fake_text;

    public function setUp()
    {
        parent::setUp();
        $this->user = User::find(1);
        $faker = Faker::create();
        $this->fake_text = $faker->text;
    }

    /**
     * Проверка создания сообщения авторизированным пользователем.
     *
     * @return void
     */
    public function testCreateMessage()
    {
        $param = [
            'content' => $this->fake_text,
        ];

        $this->actingAs($this->user)->post(route('messages.addComment'), $param);

        $message = Messages::where([
            ['content', $param['content']],
            ['user_id', $this->user->id],
        ]);
        $this->assertTrue($message->exists());
        if ($message->exists()) {
            $message->delete();
        }
    }

    /**
     * Проверка создания сообщения не авторизированным пользователем.
     *
     * @return void
     */

    public function testNotAuthMessage()
    {
        $param = [
            'content' => $this->fake_text,
        ];
        $message = Messages::where([
            ['content', $param['content']],
        ]);
        $this->post(route('messages.addComment'), $param);
        $this->assertFalse($message->exists());

    }
    /**
     * Проверка на пустое сообщение.
     *
     * @return void
     */

    public function testAddCleanMessage()
    {
        $param = [
            'content' => '',
        ];
        $message = Messages::where([
            ['content', $param['content']],
        ]);
        $this->actingAs($this->user)->post(route('messages.addComment'), $param);
        $this->assertFalse($message->exists());

    }
}