@extends('layouts.app')

@section('content')
    
<section class="section">
    <video autoplay muted loop id="video-background">
    <source src="{{ asset('storage/videos/vdo1.mp4') }}" type="video/mp4">

    </video>
    <div>
        <div>
            <div class="form">
                <h1 class="heading">
                    Login
                </h1>
                <form action="{{ route('auth') }}" method="POST">
                    @csrf

                    {{-- username --}}
                    <div>
                        <label for="username" class="label">
                            Username
                        </label>
                        <input type="username" name="username" id="username" class="input"
                               placeholder="your username" required="" value="{{ old('username') }}">
                        @error('username')
                        <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- password --}}
                    <div>
                        <label for="password" class="label">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="input" placeholder="••••••••"
                               required="">
                        @error('password')
                        <x-error-message :message="$message" />
                        @enderror
                    </div>

                    <button type="submit" class="button">
                        Sign in
                    </button>
                    <br>
                    <br>
                    <p class="link">
                        Don't have an account yet? <a href="{{ route('register') }}">
                            Register here
                        </a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</section>



<style>
/* General and mobile-first styles */
.section {
    position: relative;
    height: 100vh;
}

#video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
}


/* Add other styles as needed */
</style>

@endsection
