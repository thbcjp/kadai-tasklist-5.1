@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-md-4">
                
            </aside>
            <div class="col-xs-8">
                @if(count($tasklists) > 0)
                    @include('tasklists.index', ['tasklists' => $tasklists])
                @endif
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