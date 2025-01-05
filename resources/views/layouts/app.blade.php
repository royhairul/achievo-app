@extends('layouts.base')

@section('body')
@yield('content')

@isset($slot)
    {{ $slot }}
@endisset

<footer class="footer footer-center p-4">
    <p class="text-center text-xs lg:text-sm opacity-50">
        © 2024 Achievo. All Rights Reserved
    </p>
</footer>
@endsection