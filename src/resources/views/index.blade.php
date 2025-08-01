@extends('layouts.default')

@section('title', 'Coachtechフリマ')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="content">
        <livewire:recommend-mylist-tabs />
    </div>
@endsection