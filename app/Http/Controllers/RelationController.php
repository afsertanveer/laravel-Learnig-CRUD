<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    //
    public function index(){
        return Member::all();
    }
}
