@extends('website.layouts.main')

@section('title', 'Home Page')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/regstration.css') }}">

    <div class="container">


        <div class="regester">
            <div class="main col-md-4 col-lg-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <h3 class="text-center text-uppercase mb-3">regester</h3>
                    <div class="input-groub mb-3 ">
                        <input type="text" placeholder="your name" name="name">
                        <input type="text" placeholder="your email" name="email">
                        <input type="text" placeholder="your phone number" name="phone">
                        <input type="password" placeholder="your password" name="password">
                    </div>
                    <p class="text-white-50 mb-2 text-capitalize "><input type="checkbox"> remper me</p>
                    <button class="pt-2 pb-2 text-white text-center">login</button>
                    <p class="pt-3 text-center"><a href="">create account ...!</a></p>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
