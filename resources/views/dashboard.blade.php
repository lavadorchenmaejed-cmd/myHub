<x-layout>
<h1>Hello, {{Auth::user()->name}}!</h1>
<h2>You have successfully logged in to your account.</h2>
<form method="POST" action="{{route('logout')}}">
    @csrf
    <button type = "submit">Logout</button>
</x-layout>