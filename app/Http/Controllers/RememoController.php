<?php

namespace App\Http\Controllers;

use App\Models\Rememo;
use Illuminate\Http\Request;

class RememoController extends Controller
{
    public function show($id)
    {
        $memo = Rememo::find($id);
        return view('rememos.show', ['memo' => $memo]);
    }
    public function index()
    {
        $memos = Rememo::all();
        return view('rememos.index', ['memos' => $memos]);
    }
}
