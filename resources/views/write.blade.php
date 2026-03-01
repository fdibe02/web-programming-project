@extends('layout')

@section('head')
        <script> 
            const BASE_URL = "{{ url('/') }}/";
        </script>

        <script src="{{ url('js/write.js') }}" defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ url('css/write.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        <title>Medium for WP - New story</title>
@endsection

@section('header')
        <div>
            <a id="logo" href="{{ url('home') }}"> Medium </a>
            <a>Draft in {{ $user->name }} {{ $user->surname }}</a></a>
        </div>
        <div id="account">
            <input type="submit" id="submit" form="write-article" value="Publish">
            <a href="{{ url('profile') }}" id="personal-area">
                <img src="https://static.vecteezy.com/ti/vettori-gratis/t1/15154794-utente-uomo-account-profilo-umano-membro-icona-vettore-simbolo-cartello-gratuito-vettoriale.jpg">
            </a>
        </div>
@endsection

@section('content')
  <section>
    <form name="write-article" method="post" id="write-article">
        @csrf
        <input type="text" name="title" id="article-title" placeholder="Title"></input>
        <textarea name="subtitle" id="subtitle" placeholder="subtitle"></textarea>
        <input type="text" name="topic" id="topic" placeholder="topic"></input>
        <textarea id="content" name="content" placeholder="Write your story..."></textarea>  
        <input type="hidden" name="img" id="image-input">
   </form>
   <div id="container">Choose an image for your article</div>
  </section>
@endsection