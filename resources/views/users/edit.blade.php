<!-- @extends('layouts.app')

@section('content')
@section('content')
<section class="section">
    <div>
        <div>
            <div class="form">
                <h1 class="heading">
                    Edit Profile
                </h1>
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- username --}}
                    <div>
                        <label for="username" class="label">
                            Username
                        </label>
                        <input type="text" name="username" id="username" class="input"
                            placeholder="Your username" required value="{{ $user->username }}">
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
                            placeholder="Your name" required value="{{ $user->name }}">
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
                            placeholder="Your age" required value="{{ $user->age }}">
                        @error('age')
                        <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- email --}}
                    <div>
                        <label for="email" class="label">
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="input"
                            placeholder="Your email" required value="{{ $user->email }}">
                        @error('email')
                        <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- phone number (optional) --}}
                    <div>
                        <label for="phone_number" class="label">
                            Phone Number (Optional)
                        </label>
                        <input type="text" name="phone_number" id="phone_number" class="input"
                            placeholder="Your phone number" value="{{ $user->phone_number }}">
                        @error('phone_number')
                        <x-error-message :message="$message" />
                        @enderror
                    </div>

                    {{-- image upload --}}
                    <div>
                        <label for="user_image" class="label">Profile Image (Optional)</label>
                        <div class="file-input">
                            <input type="text" id="file-name" class="file-display" placeholder="No file chosen"
                                readonly>
                            <input type="file" id="user_image" name="image" style="display: none;"
                                onchange="document.getElementById('file-name').value = this.files[0].name">
                            <button type="button" class="file-button"
                                onclick="document.getElementById('user_image').click();">Choose Image</button>
                        </div>
                    </div>

                    {{-- password fields are optional for editing profile --}}
                    {{-- Password --}}
                    {{-- Confirm Password --}}

                    <button type="submit" class="button">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
   
</style>
@endsection -->
