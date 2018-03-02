<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tasklist;   // 藤原 追加

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasklists/にアクセスされた場合の『一覧表示処理』
    public function index()
    {
        $tasklists = Tasklist::all();

        return view('tasklists.index', ['tasklists' => $tasklists, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasklists/createにアクセスされた場合の『新規登録画面表示処理』
    public function create()
    {
        $tasklist = new Tasklist;

        return view('tasklists.create', ['tasklist' => $tasklist, ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // postでtasklists/にアクセスされた場合の『新規登録処理』
    public function store(Request $request)
    {
        // バリデーション処理
        $this->validate($request, [
            'status' => 'required | max:10',  // 追加
            'content' => 'required | max:255',
        ]);

        $tasklist = new Tasklist;
        $tasklist->status = $request->status;  // 追加
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでtasklists/idにアクセスされた場合の『取得表示処理』
    public function show($id)
    {
        $tasklist = Tasklist::find($id);
        return view('tasklists.show', ['tasklist' => $tasklist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // getでtasklists/id/editにアクセスされた場合の『更新画面表示処理』
    public function edit($id)
    {
        $tasklist = Tasklist::find($id);
        return view('tasklists.edit', ['tasklist' => $tasklist,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // putまたはpatchでtasklists/idにアクセスされた場合の『更新処理』
    public function update(Request $request, $id)
    {
        // バリデーション処理
        $this->validate($request, [
            'status' => 'required | max:10',  // 追加
            'content' => 'required | max:255',
        ]);

        $tasklist = Tasklist::find($id);
        $tasklist->status = $request->status;  // 追加
        $tasklist->content = $request->content;
        $tasklist->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // deleteでtasklists/idにアクセスされた場合の『削除処理』
    public function destroy($id)
    {
        $tasklist = Tasklist::find($id);
        $tasklist->delete();

        return redirect('/');
    }
}
