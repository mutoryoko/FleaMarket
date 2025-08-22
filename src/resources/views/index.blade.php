@extends('layouts.default')

@section('title', 'Coachtechフリマ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    @if (session('status'))
        <p class="session">{{ session('status') }}</p>
    @endif
    <div class="content">
        <livewire:recommend-mylist-tabs :tab="request('tab')"/>
    </div>
@endsection