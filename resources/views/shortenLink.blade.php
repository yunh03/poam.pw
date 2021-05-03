@extends('app')

@section('content')
    <section class="s-url">
        <div class="container">
            <h1>✋ 긴 URL을<br />짧은 URL로 줄여보세요.</h1>
            <p>아래에 긴 URL을 입력하고, 단축하기 버튼을 눌러보세요.</p>
            <form method="POST" autocomplete="off" id="s-url" action="{{ route('generate.shorten.link.post') }}">
                @csrf
                <input type="text" name="link" class="s-url-input" placeholder="긴 URL을 입력하세요." onChange="this.value=getRightURL(this.value)" autofocus>
                <a onclick="document.getElementById('s-url').submit();">단축하기 <i class="fas fa-angle-right"></i></a>
            </form>
        </div>
    </section>

    <section class="s-url-alert">
        <div class="container">
            @if (Session::has('error'))
                <h1>👎 오류가 발생했어요.</h1>
                <p>{{ Session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <h1>👍 생성을 완료했어요.</h1>
                <p>아래 링크를 눌러 복사하고, 주소창에 붙여넣거나 공유하세요.
                <p><i class="far fa-check-circle"></i> <a href="javascript:copyToClipboard('#qops-url-copy');"><span id="qops-url-copy">https://poam.pw/{{ Session::get('success') }}</span><i class="far fa-copy"></i></p></a>
            @endif
        </div>
    </section>
@endsection