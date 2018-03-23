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
        /* 以下はすべてのユーザーのタスクをviewに渡す処理
        // $tasklists = Tasklist::all();

        // return view('tasklists.index', ['tasklists' => $tasklists, ]);
        */
        
        // 以下は個々のユーザーだけのタスクをviewに渡す処理
        $data = [];
        if(\Auth::check()){
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
        }

        return view('tasklists.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     // getでtasklists/createにアクセスされた場合の『新規登録画面表示処理』
    public function create()
    {
        if(\Auth::check()){
            //$tasklist = \App\Tasklist::find($id);
            //if (\Auth::user()->id === $tasklist->user_id) {
            // if ($request->user()->id === $tasklist->user_id) {
                //return view('tasklists.create', ['tasklist' => $tasklist,]);
                return view('tasklists.create');
            //} else {
            //    return redirect('/');
           // }
        //} else {
        //    return redirect('/');
        } else {
            return view('/');
        }
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

      if(\Auth::check()){
            $user = \Auth::user();
    
            $tasklist = new Tasklist;
            $tasklist->status = $request->status;  // 追加
            $tasklist->content = $request->content;
            $tasklist->user_id = $user->id; // 外部キー制約
            $tasklist->save();
      }
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
        // 以下はすべてのユーザーのタスクをviewに渡す処理
        // $tasklist = Tasklist::find($id);
        // return view('tasklists.show', ['tasklist' => $tasklist]);


        // 以下は個々のユーザーだけのタスクをviewに渡す処理
        $data = [];
        if(\Auth::check()){
            $user = \Auth::user();
            $tasklist = $user->tasklists()->where('id',$id)->get();
            //$tasklist = $user->tasklists()->where('id',$id)->get();
//dd($tasklist[0]->id);
            $data = [
                'user' => $user,
                'tasklist' => $tasklist[0],
            ];
        }

        return view('tasklists.show', $data);
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
         if(\Auth::check()){
            $tasklist = Tasklist::find($id);
            if (\Auth::user()->id === $tasklist->user_id) {
                return view('tasklists.edit', ['tasklist' => $tasklist,]);
            } else {
                return redirect('/');
            }
         } else {
             return redirect('/');
         }
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

        if(\Auth::check()){
            $tasklist = Tasklist::find($id);

            if ($request->user()->id === $tasklist->user_id) {
                $tasklist->status = $request->status;  // 追加
                $tasklist->content = $request->content;
                $tasklist->user_id = $request->user()->id; // 外部キー制約
                $tasklist->save();
            }
        }
        
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
        //$tasklist = Tasklist::find($id);
        //$tasklist->delete();

        $tasklist = \App\Tasklist::find($id);

        if (\Auth::user()->id === $tasklist->user_id) {
            $tasklist->delete();
        }

        return redirect('/');
    }
}
