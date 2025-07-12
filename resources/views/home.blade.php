@extends('layouts.master')

@section('title', 'Event Management System')

@section('content')
     <div class="header-section">
        <div class="overlay"></div>
        <div class="nav-links">
            <a href="#about-us" class="nav-link">About Us</a>
            <a href="#contact-us" class="nav-link">Contact Us</a>
        </div>
        <div class="header-content">
            <h1 class="main-title">Let's Event Together!</h1>
            <h2 class="sub-title">Your events, simplified</h2>
            <p class="welcome-message">Welcome to our platform for managing events seamlessly.</p>
            <a href="{{ route('login') }}" class="get-started-btn">Get Started</a>
        </div>
    </div>

 @endsection
