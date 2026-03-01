@extends('layout')

@section('head')
@parent

<script src="{{ url('js/profile.js') }}" defer></script>

<link rel="stylesheet" href="{{ url('css/profile.css') }}">
<link rel="stylesheet" href="{{ url('css/common.css') }}">

<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<title>Your Account</title>

@endsection

@section('header')
@parent
@endsection

@section('content')

  <section>
    <div id="user-bar">
      <h2 id="nome">{{ $user->name }} {{ $user->surname}}</h2>
      <a href="{{ url('logout') }}" id="logout">Sign out</a>
    </div>
    <h3>Liked Articles</h3>
    <div id="liked-articles">
       
    </div>
  </section>

@endsection