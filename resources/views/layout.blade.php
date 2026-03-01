<html>

<head>
@section('head')
  <script>
    const BASE_URL = "{{ url('/') }}/";
  </script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('css/common.css') }}">
@show
</head>


  <header>
    @section('header')
    <div id="start">
      <a id="logo" href="{{ url('home') }}"> Medium </a>
      <form action="{{ url('home/search') }}">
      <input type="text" name="search" id="searchbar" placeholder="  &#128269; Search"></input> 
      </form>
    </div>
    
    <div id="account">
      <a href="{{ url('write') }}" id="write">&#128394; Write</a>
      <a href="{{ url('profile') }}" id="personal-area">
        <img src="https://static.vecteezy.com/ti/vettori-gratis/t1/15154794-utente-uomo-account-profilo-umano-membro-icona-vettore-simbolo-cartello-gratuito-vettoriale.jpg">
      </a>
    </div>
  @show  
  </header>

  @yield('content')

</body>

</html>