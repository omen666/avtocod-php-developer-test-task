<?php
/**
 * Created by PhpStorm.
 * User: omene
 * Date: 28.09.2019
 * Time: 13:16
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request) {
        return view('main');
    }
}
