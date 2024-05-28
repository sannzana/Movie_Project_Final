@extends('layouts.app')

@section('content')
    {{-- User Profile --}}
    <section id="user-profile">
        <div class="container">
            <div class="profile-header">
                <h2>User Profile</h2>
            </div>
            <div class="profile-content">
                <div class="profile-row">
                    <h3>Name</h3>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="profile-row">
                    <h3>Username</h3>
                    <p>&commat;{{ $user->username }}</p>
                </div>
                <div class="profile-row">
                    <h3>Age</h3>
                    <p>{{ $user->age }}</p>
                </div>
            </div>
            <div class="profile-actions">
                <!-- <a href="{{ route('users.edit') }}">
                    <button class="button">Edit Profile</button>
                </a> -->
            </div>
        </div>
    </section>


<style>
    /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container for the profile section */
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background: #fff;
}

/* Profile header styling */
.profile-header h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* Profile content styling */
.profile-content {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 10px;
}

/* Profile row styling */
.profile-row {
    display: contents;
}

.profile-row h3 {
    margin: 0;
    padding: 10px;
    background: #f8f8f8;
    border: 1px solid #ddd;
    text-align: right;
}

.profile-row p {
    margin: 0;
    padding: 10px;
    border: 1px solid #ddd;
}

/* Profile actions styling */
.profile-actions {
    text-align: center;
    margin-top: 20px;
}

.profile-actions .button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 5px;
}

.profile-actions .button:hover {
    background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 600px) {
    .profile-content {
        grid-template-columns: 1fr;
    }

    .profile-row h3 {
        text-align: left;
        background: #fff;
    }
}

</style>


@endsection








