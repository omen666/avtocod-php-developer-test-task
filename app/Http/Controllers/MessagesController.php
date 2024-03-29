<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Добавление комментария
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function addComment(Request $request)
    {
        $data = $request->all();
        if (!$this->validator($data)->fails() && Auth::check()) {
            $this->create($data);
        } else {
            return redirect()->route('main')->withErrors(['msg', 'The Message']);
        }
        return redirect()->route('main');
    }

    /**
     * Удаление комментария
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function removeComment(Request $request)
    {
        $data = $request->all();
        $message = Messages::find($data['id']);
        if ($message->user_id == Auth::user()->id || Auth::user()->is_admin) {
            $message->delete();
        }
        return redirect()->route('main');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|string',
        ]);
    }

    /**
     * Удаление комментария
     *
     * @param array $data
     * @return bool
     */

    protected function create(array $data)
    {
        $message = new Messages();
        $message->user_id = Auth::user()->id;
        $message->content = $data['content'];
        return $message->save();
    }
}
