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
    public function index()
    {
        return view('main', [
            'messages' => Messages::all()->sortByDesc('created_at')
        ]);
    }

}
