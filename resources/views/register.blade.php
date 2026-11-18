<x-layout>
    <h1>Register</h1>
    <form method = "POST" action="{{ route('register.store') }}">
        @csrf
        
        <input type="text" name="name" placeholder="Name"/>
         <input type="text" name="username" placeholder="Username"/>
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>

        <button type="submit" id="register">Register</button>
    </form>

    <x-form-errors/>

    <div class="form-footer">
        Already have an account?
        <a href="login">Log In</a>
    </div>
</x-layout>