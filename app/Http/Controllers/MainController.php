<?php
/**
 * Created by PhpStorm.
 * User: omene
 * Date: 28.09.2019
 * Time: 13:16
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;

class MainController extends Controller
{
    /**
     * Функция выводит представления на главной странице с массивом отзывов
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('main', [
            'messages' => Messages::all()->sortByDesc('created_at')
        ]);
    }

}
