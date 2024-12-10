@extends('layouts.base')

@section('body')
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset

    <footer class="footer footer-center p-8">
        © 2024 Achievo. All Rights Reserved
    </footer>
@endsection