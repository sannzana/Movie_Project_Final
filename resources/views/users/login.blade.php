@extends('layouts.app')

@section('content')
<section class="section">
    <video autoplay muted loop id="video-background">
        <source src="{{ Storage::url('videos/v.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div>
        <div>
            <div class="form">
                <h1 class="heading">Login</h1>
                <form action="{{ route('auth') }}" method="POST">
                    @csrf

                    {{-- username --}}
                    <div>
                        <label for="username" class="label">Username</label>
                        <input type="text" name="username" id="username" class="input" placeholder="your username" required value="{{ old('username') }}">
                        @error('username')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- password --}}
                    <div>
                        <label for="password" class="label">Password</label>
                        <input type="password" name="password" id="password" class="input" placeholder="••••••••" required>
                        @error('password')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    <button type="submit" class="button">Sign in</button>
                    <br><br>
                    <p class="link">
                        Don't have an account yet? <a href="{{ route('register') }}">Register here</a>
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
    /* overflow: hidden; */
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

.form {
    position: relative;
    z-index: 1;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 8px;
    width: 100%;
    max-width: 300px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.heading {
    text-align: center;
    color: #000;
    margin-bottom: 20px;
}

.input, .button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
}

.input {
    border: 1px solid #ccc;
    border-radius: 4px;
}

.label {
    display: block;
    margin-bottom: 5px;
}

.button {
    background-color: #004080;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0059b3;
}

.link {
    text-align: center;
    margin-top: 20px;
    color: #004080;
}

.link a {
    color: #004080;
    text-decoration: none;
}

.link a:hover {
    text-decoration: underline;
}

/* Tablet and larger devices */
@media (min-width: 768px) {
    .form {
        padding: 30px;
        border-radius: 10px;
    }

    .heading {
        font-size: larger;
    }
}

/* Desktop and larger screens */
@media (min-width: 1024px) {
    .section {
        padding: 20px;
    }

    .form {
        max-width: 350px;
    }
}
</style>
@endsection
