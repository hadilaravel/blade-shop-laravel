@extends('home::layouts.master')
@section('head-tag')
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keywords" content="{{ $setting->keywords }}">
    <title>{{ $setting->title }}</title>
    <link rel="canonical" href="{{ route('home.index') }}">

    <meta property="og:type" content="home">
    <meta property="og:title" content="{{ $setting->title }}">
    <meta property="og:description" content="{{ $setting->description }}">
    <meta property="og:image" content="{{ asset($setting->logo_header) }}">
    <meta property="og:url" content="{{  route('home.index') }}">
    <meta property="og:site_name" content="{{ $setting->title }}">

@endsection
@section('content')

        <!-- HERO SLIDER -->
        @include('home::home.slider')
        <!-- SECTION IMAGE -->
        @include('home::home.sectionImage' )
        <!-- OFF SLIDER -->
        @include('home::home.lastOffer' )
        <!-- PRODUCT SLIDER 1 -->
        @include('home::home.productHome')
        <!-- BIG SLIDER -->
        @include('home::home.amazingProduct')
        <!-- 4 IMAGE -->
        @include('home::home.fourBanner' )
        <!-- GOOD CATEGORYS -->
        @include('home::home.categories' )
        <!-- SECTION IMAGE 2 -->
        @include('home::home.twoBanner')
        <!-- PRODUCT SLIDER 3 -->
        @include('home::home.brands')
        <!-- BLOG -->
        @include('home::home.blog')


@endsection
