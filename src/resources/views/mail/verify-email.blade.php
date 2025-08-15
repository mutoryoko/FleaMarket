@extends('layouts.default')

@section('title', 'メール認証')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/email.css')}}" />
@endsection

@section('content')
    @if (session('status'))
        <p class="session">{{ session('status') }}</p>
    @endif
    <div class="content">
        @guest
            <p class="text">登録していただいたメールアドレスに認証メールを送付しました。<br/>メール認証を完了してください。</p>
            <a class="verify__btn" href="https://mailtrap.io/inboxes">認証はこちらから</a>
            <form action="{{ route('verification.send.guest') }}" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email ?? '') }}" />
                <button class="send-mail__btn" type="submit">認証メールを再送する</button>
            </form>
        @endguest
        @auth
            <p class="text">登録していただいているメールアドレスの認証を完了してください。</p>
            <a class="verify__btn" href="https://mailtrap.io/inboxes">認証はこちらから</a>
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button class="send-mail__btn" type="submit">認証メールを再送する</button>
            </form>
        @endauth
    </div>
@endsection