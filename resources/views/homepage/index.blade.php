@extends('layouts.app')
@section('content')
    @php
        $setting = \App\Models\Setting::first();
    @endphp
    {{-- @dd($setting) --}}
    <!-- Hero Section -->
    @include('homepage.sections.hero')
    <!-- About Section -->
    @include('homepage.sections.about')


    <!-- Projects Section -->
    @include('homepage.sections.project')

    <!-- Portofolio Section -->
    @include('homepage.sections.portfolio')
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