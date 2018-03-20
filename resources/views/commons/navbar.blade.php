<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        
            <div class="container">
            <div class="navbar-header">

                <!-- 横幅が狭いときに出るハンバーガーメニュー -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- ホームへ戻るリンク ブランドロゴなんかもここに書く -->
                <a class="navbar-brand" href="/">Tasklist</a>

            </div>

            <!-- メニュー項目 -->
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li>{!! link_to_route('users.index', 'ユーザ一覧') !!}</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanted="false">{!! Auth::user()->name !!}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>{!! link_to_route('tasklists.create', '新規タスクの投稿') !!}</li>
                            <li>{!! link_to_route('tasklists.index', 'マイタスク一覧') !!}</li>
                            <li role="separator" class="divider"></li>
                            <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                    @else
                        <li>{!! link_to_route('signup.get', 'サインアップ') !!}</li>
                        <li>{!! link_to_route('login.get', 'ログイン') !!}</li>
                    @endif
                </ul>
            </div>
            
        </div>
    </nav>
</header>