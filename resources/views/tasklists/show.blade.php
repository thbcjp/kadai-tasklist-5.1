@extends('layouts.app')

@section('content')

    @if(Auth::check())

        <!-- ここにページ毎のコンテンツを書く -->
            <h1>id = {{ $tasklist->id }} のタスク詳細ページ</h1>
        
            <table class="table table-bordered table-hover">
                <tr>
                    <th>id</th>
                    <td>{{ $tasklist->id }}</td>
                </tr>
                <tr>
                    <th>ステータス</th>
                    <td>{{ $tasklist->status }}</td>
                </tr>
                <tr>
                    <th>タスク</th>
                    <td>{{ $tasklist->content }}</td>
                </tr>
            </table>
        
            {!! link_to_route('tasklists.edit', 'このステータス, タスクの編集', ['id' => $tasklist->id], ['class' => 'btn btn-default']) !!}
        
            {!! Form::model($tasklist, ['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}

        @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそ、私のタスクリストへ！</h1>
                {!! link_to_route('signup.get', 'サインアップ', null, ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    @endif

@endsection