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
    public function create()
    {
        return view('rememos.create');
    }

    public function store(Request $request)
    {
        $memo = new Rememo;
        $memo->title = $request->title;
        $memo->body = $request->body;
        $memo->save();
        return redirect(route("rememos.index"));
    }
}
