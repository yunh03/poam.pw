<!DOCTYPE html>
<html lang="ko" translate="no">
    <head>
        <meta charset="UTF-8">
        <title>SUT.KR - 단축 URL</title>
        <meta name="description" content="너무나도 긴 주소를 짧은 주소로 단번에 줄여보세요.">
        <meta property="og:type" content="website"> 
        <meta property="og:title" content="SUT.KR - 단축 URL">
        <meta property="og:description" content="너무나도 긴 주소를 짧은 주소로 단번에 줄여보세요.">
        <meta property="og:image" content="background.jpg">
        <meta property="og:url" content="https://sut.kr">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('css/grid.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.typekit.net/ckj4ckq.css">
        <script src="https://kit.fontawesome.com/f71af7eb4e.js" crossorigin="anonymous"></script>
        <link href='//spoqa.github.io/spoqa-han-sans/css/SpoqaHanSans-kr.css' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <body>
        <section class="s-header">
            <div class="container">
                <h1><a href="/">SUT.KR</a></h1>
            </div>
        </section>
        @yield('content')
        <section class="s-footer">
            <div class="container">
                <p><a href="/terms">이용약관</a> | <a href="mailto:yunsol267@gmail.com">이메일 문의</a></p>
                <p>SUT.KR 2021 모든 권리 보유.
            </div>
        </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</html>