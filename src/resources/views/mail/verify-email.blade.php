@extends('layouts.default')

@section('title', 'メール認証')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/email.css')}}" />
@endsection

@section('content')
    <div class="content">
        <p class="text">登録していただいたメールアドレスに認証メールを送付しました。<br/>メール認証を完了してください。</p>
        <a class="verify__btn" href="">認証はこちらから</a>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="send-mail__btn" type="submit">認証メールを再送する</button>
        </form>
    </div>
@endsection