@extends('layout')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('css/auth.css') }}">
    <script src="{{ url('js/auth.js') }}" defer></script>

    <title>Medium for Wp: Sign Up</title>

@endsection

@section('header')
<div id="logo"> Medium </div>
            <div id="start">
                <a id="story">Our Story</a>
                <a id="membership">Membership</a>
                <a id="write">Write</a>
                <a class="login">Sign in</a>
                <button class="register">Get started</button>
</div>
@endsection

@section('content')

        <div id="modal-register" class="hidden">
            <section id="form-register">
                <div class="exit">&times</div>
                <h3>join Medium.</h3>
                @if($error == 'email_exists')
                <a class="error">Email già esistente</a>
                @endif
                <form name='register' method='post' action="{{ url('register') }}">
                    @csrf
                    <div class="nome">
                        <label for="name">Name</label> 
                        <input type='text' name='name' id="name" value='{{ old("name") }}'>
                        <span class="hidden">Enter your name</span>
                    </div>
                    <div class="cognome">
                        <label for="surname">Surname</label>
                        <input type='text' name='surname' id="surname" value='{{ old("surname") }}'>
                        <span class="hidden">Enter your surname</span>
                    </div>
                    <div class="email">
                        <label for="email">E-mail</label>
                        <input type='text' name='email' id="email"  value='{{ old("email") }}'>
                        <span class="hidden">Enter your e-mail</span>
                    </div>
                    <div class="password">
                        <label for="password">Password</label>
                        <input type='password' name='password' id="password">
                        <span class="hidden">Choose your password</span>
                    </div>
                    <div class="conf-password">
                        <label for="conf-password">Confirm Password</label>
                        <input type='password' name='conf_password' id="conf-password">
                        <span class="hidden">Confirm your password</span>
                    </div>    
                    <input type="submit" value="Crea Account">
                </form>
                <a>Already have an account? <strong class="login">Sign in</strong></a>
            </section>
        </div>

        <div id="modal-login" class="hidden">
            <section id="form-login">
                <div class="exit">&times</div>
                <h3>Welcome back.</h3>
                @if($error == 'wrong')
                <a class="error">Wrong e-mail and/or password </a>
                @endif
                <form name="login" method='post' action="{{ url('login') }}">
                    @csrf
                    <div class="email">
                        <label for="email-si">E-mail</label>
                        <input type='text' name='email' id="email-si" value="{{ old('email') }}">
                        <span class="hidden">Enter your e-mail</span>
                    </div>
                    <div class="password">
                        <label for="password-si">Password</label>
                        <input type='password' name='password' id="password-si">
                        <span class="hidden">Enter your password</span>                   
                    </div>
                    <input type="submit" value="Accedi">
                </form>
                <a>Don't have an account? <strong class="register">Sign up</strong></a>
            </section>
        </div>

        <section id="main">
            <h1>Human<br>Stories & Ideas</h1>  
            <h3>A place to read, write, and deepen your understanding</h3>  
            <button class="register">Start Reading</button>
        </section>

        <footer>
            <a>Help</a>
            <a>Status</a>
            <a>About</a>
            <a>Carrers</a>
            <a>Press</a>
            <a>Blog</a>
            <a>Privacy</a>
            <a>Rules</a>
            <a>Terms</a>
            <a>Text to speech</a>
        </footer>
@endsection