@extends('layout')

@section('head')
@parent
  <script>
    const csrf_token = '{{ csrf_token() }}';
  </script>
  <script src="{{ url('js/home.js') }}" defer></script>

  <link rel="stylesheet" href="{{ url('css/home.css') }}">
  <link rel="stylesheet" href="{{ url('css/common.css') }}">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <title>Medium for WP</title>

@endsection
  
  @section('header')
  @parent
  @endsection

  @section('content')

  <div id="dislike-modal" class="hidden">
    <div id="dislike-box">
      <div id="dislike-message">
        <h5>Got it, we'll reccomend fewer contents like this</h5>
        <h6>You can additionally take any of the actions below</h6>
      </div>
      <div class="dislike-choise">
        <p>Mute author</p>
      </div>
      <div class="dislike-choise">
        <p>Mute pubblication</p>
      </div>
      <div id="report">
        <p>Report story</p>
      </div>

      <div id="dislike-options">
        <button id="undo">Undo</button>
        <button id="done">Done </button>
      </div>
    </div>
  </div>

  <article>

    <section id="feed">

      <nav>
        <div class="topic">Education</div>
        <div class="topic">Featured</div>
        <div class="topic">Lifestyle</div>
        <div class="topic">Science</div>
        <div class="topic">Productivity</div>
        <div class="topic">Books</div>
        <div class="topic">Apple</div>
        <div class="topic">Science</div>
        <div class="topic">Tech</div>
      </nav>

      <div id="main">
        @foreach($articles as $article)
           @if(!$article->usersByDislikes->contains($user_id))
        <div class="card" data-id="{{ $article->id }}">
            <div class="content">
                <div class="author">
                    <div class="credits">by {{ $article->author->name}} {{$article->author->surname }}</div>
                </div>
                <a class="text">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->subtitle }}</p>
                </a>
                <div class="card-footer">
                    <div class="interaction">
                        <div class="date"> {{ $article->formatDate() }}</div> 
                        <div class="likes">
                            <div class="n">{{ $article->likes }} </div>
                            @if($article->usersByLikes->contains($user_id))
                            <div class="add-like" data-added="true">
                               &#11088;
                                @else
                                <div class="add-like" data-added="false">
                                &#10133;
                                @endif
                            </div>
                        </div>
                        <div class="dislike">&#128078;</div>
                    </div>
                </div>    
            </div>
            <div class="image-space">
                @if($article->image_src)
                <img src="{{ $article->image_src }}">
                @endif
            </div>
        </div>
          @endif
        @endforeach
      </div>

    </section>

    <section id="side-bar">

      <div id="news-section">

      </div>
      
      
    </section>

  </article>
@endsection