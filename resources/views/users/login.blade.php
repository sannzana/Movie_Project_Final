@extends('layouts.app')

@section('content')
    
<section class="section">
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
    background-color: navy;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 10px;
    box-sizing: border-box;
}

.form {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 8px;
    width: 100%; /* Full width on small screens */
    max-width: 300px; /* Maximum width */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.heading {
    text-align: center;
    color: #000;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5), -1px -1px 2px rgba(0, 0, 0, 0.8);
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
        max-width: 350px; /* Slightly larger form on big screens */
    }
}

@endsection
