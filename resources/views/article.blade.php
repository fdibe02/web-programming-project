@extends('layout')

@section('head')
@parent
        <title> {{ $article->title }} </title>

        <link rel="stylesheet" href="{{ url('css/article.css') }}">
        <link rel="stylesheet" href="{{ url('css/common.css') }}">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
@endsection

@section('header')
@parent
@endsection

@section('content')
        <section>
            <h2 id="title"> {{ $article->title}} </h2>
            <div id="subtitle"> {{ $article->subtitle}} </div>
            <div id="interactions"></div>
            <img src="{{ $article->image_src }}">
            <div id="content">{{ $article->content}} </div>
        </section>
@endsection