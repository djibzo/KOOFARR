<?php

namespace App\Http\Controllers;

use App\Models\AccountC;
use Illuminate\Http\Request;

class Account_cController extends Controller
{
    public function index()
    {
        $note = AccountC::all();
    }
}
