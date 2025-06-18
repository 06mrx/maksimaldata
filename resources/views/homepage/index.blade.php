@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    @include('homepage.sections.hero')
    <!-- About Section -->
    @include('homepage.sections.about')


    <!-- Projects Section -->
    @include('homepage.sections.project')
    <!-- Services Section -->
    @include('homepage.sections.service')

    <!-- Partners Section -->
    @include('homepage.sections.partner')

    <!-- Trainging Schedule Section -->
    @include('homepage.sections.training-schedule')

    <!-- Contact Section -->
    @include('homepage.sections.contact')

    <!-- Footer -->
    @include('homepage.sections.footer')

@endsection