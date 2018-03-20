@extends('layouts.app')

@section('content')

    @if(Auth::check())

        <!-- ここにページ毎のコンテンツを書く -->
            <h1>タスクリスト一覧</h1>
        
            @if(count($tasklists) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>ステータス</th>
                            <th>タスク</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasklists as $tasklist)
                        <tr>
                            <td>{!! link_to_route('tasklists.show', $tasklist->id, ['id' => $tasklist->id]) !!}</td>
                            <td>{{ $tasklist->status }}</td>
                            <td>{{ $tasklist->content }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        
            {!! link_to_route('tasklists.create', '新規タスクの登録', null, ['class' => 'btn btn-primary']) !!}

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそ、私のタスクリストへ！</h1>
                {!! link_to_route('signup.get', 'サインアップ', null, ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    @endif

@endsection