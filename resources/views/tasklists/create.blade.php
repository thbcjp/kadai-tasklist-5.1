@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

    <div class="row"><!-- START row -->

        <div class="form-group col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">

            <h1>タスク新規作成ページ</h1>

        {!! Form::model('tasklist', ['route' => 'tasklists.store']) !!}

            <div class="form-group">
                {!! Form::label('status', 'ステータス') !!}
                {!! Form::text('status', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('content', 'タスク') !!}
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

        </div><!-- END form-group -->

    </div><!-- END row -->


@endsection