@extends('layouts.default')

@section('title', 'メール認証')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mail.css')}}" />
@endsection

@section('content')
    <p class="text">登録していただいたメールアドレスに認証メールを送付しました。<br/>メール認証を完了してください。</p>
    <a href="">認証はこちらから</a>
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">認証メールを再送する</button>
    </form>
@endsection