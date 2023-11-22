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

    public function edit($id)
    {
        $memo = Rememo::find($id);
        return view('rememos.edit', ['memo' => $memo]);
    }

    public function update(Request $request, $id)
    {
        // ここはidで探して持ってくる以外はstoreと同じ
        $memo = Rememo::find($id);

        // 値の用意
        $memo->title = $request->title;
        $memo->body = $request->body;

        // 保存
        $memo->save();

        // 登録したらindexに戻る
        return redirect(route("rememos.index"));
    }
    public function destroy($id)
    {
        $memo = Rememo::find($id);
        $memo->delete();

        return redirect(route("rememos.index"));
    }
}
