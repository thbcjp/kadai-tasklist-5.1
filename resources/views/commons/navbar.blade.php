<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
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
                    <li>{!! link_to_route('tasklists.create', '新規タスクの投稿') !!}</li>
                </ul>
            </div>

        </div>
    </nav>
</header>