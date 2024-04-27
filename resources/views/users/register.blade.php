@extends('layouts.app')

@section('content')
<section class="section">
    <div>
        <div>
            <div class="form">
                <h1 class="heading">
                    Register
                </h1>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- username --}}
                    <div>
                        <label for="username" class="label">
                            Username
                        </label>
                        <input type="text" name="username" id="username" class="input"
                               placeholder="Your username" required value="{{ old('username') }}">
                        @error('username')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- name --}}
                    <div>
                        <label for="name" class="label">
                            Name
                        </label>
                        <input type="text" name="name" id="name" class="input"
                               placeholder="Your name" required value="{{ old('name') }}">
                        @error('name')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- age --}}
                    <div>
                        <label for="age" class="label">
                            Age
                        </label>
                        <input type="number" name="age" id="age" class="input"
                               placeholder="Your age" required value="{{ old('age') }}">
                        @error('age')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- image upload --}}
                    <div>
                    <label for="user_image" class="label">Profile Image (Optional)</label>
<div class="file-input">
    <input type="text" id="file-name" class="file-display" placeholder="No file chosen" readonly>
    <input type="file" id="user_image" name="image" style="display: none;" onchange="document.getElementById('file-name').value = this.files[0].name">
    <button type="button" class="file-button" onclick="document.getElementById('user_image').click();">Choose Image</button>
</div>


                    {{-- password --}}
                    <div>
                        <label for="password" class="label">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="input" placeholder="••••••••"
                               required>
                        @error('password')
                            <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- confirm password --}}
                    <div>
                        <label for="password_confirmation" class="label">
                            Confirm Password
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="••••••••"
                               required>
                    </div>

                    <button type="submit" class="button">
                        Sign up
                    </button>
                    <p class="link">
                        Already have an account? <a href="{{ route('login') }}">
                            Login here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
.section {
    background-color: navy;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 10px;
    box-sizing: border-box;
}

.form {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 50px; /* More padding for vertical spacing */
    border-radius: 8px;
    width: 100%;
    max-width: 500px; /* Wider form for better layout */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px; /* To ensure there's space around the form */
}

.heading {
    /* Other styles remain the same */
}

.label {
    display: block;
    margin-bottom: 10px;
}

.input {
    width: calc(100% - 20px); /* Accounting for padding */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.button {
    /* Other styles remain the same */
}

.file-input {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.file-display {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 4px;
    width: 70%; /* Adjust the width as needed */
    margin-right: 10px; /* Space between input and button */
}

.file-button {
    /* Other styles remain the same */
}

.link {
    /* Other styles remain the same */
}

/* Remember to include responsiveness with media queries */

/* Desktop and larger screens */
@media (min-width: 1024px) {
    .section {
        padding: 20px;
    }

    .form {
        max-width: 350px; /* Slightly larger form on big screens */
    }
}





</style>
@endsection
