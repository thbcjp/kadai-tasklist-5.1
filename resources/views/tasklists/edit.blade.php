@extends('layouts.app')

@section('content')

    @if(Auth::check())

        <!-- ここにページ毎のコンテンツを書く -->
        <div class="row">
            
            <div class="form-group col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
        
            <h1>id： {{ $tasklist->id }} のタスク編集ページ</h1>
        
            {!! Form::model($tasklist, ['route' => ['tasklists.update', $tasklist->id], 'method' => 'put'] ) !!}
        
                <div class="form-group">
                {!! Form::label('status', 'ステータス：') !!}
                {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                {!! Form::label('content', 'タスク：') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        
            </div>
        
        </div>

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>ようこそ、私のタスクリストへ！</h1>
                {!! link_to_route('signup.get', 'サインアップ', null, ['class' => 'btn btn-primary btn-block']) !!}
            </div>
        </div>
    @endif

@endsection