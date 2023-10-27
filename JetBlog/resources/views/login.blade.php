@include('includes/header')

{{-- Login block --}}
<div class="w-100 d-flex justify-content-center mt-5">
    <div class="bg-light w-25 d-flex justify-content-center p-5 rounded border border-dark">
        {{-- Login Form --}}
        <form action="{{ route ('login') }}" method="POST">
            @csrf
            {{-- succesfully registered message --}}
            @if(session('msg'))
            <p class="text-primary text-center">Registered Succesfully! You can now log in to your new account!</p>
            @endif
            {{-- Username --}}
            <label for="username">Username:</label><br>
            <input id="username" name="username" type="text" placeholder="Username"><br>
            {{-- Password --}}
            <label class="mt-3" for="password">Password:</label><br>
            <input id="password" name="password" type="password" placeholder="Password"><br>
            <input id="showPasswordBox" type="checkbox"><label style="margin-left: 5px; color: grey;" for="showPasswordBox">Show Password</label><br><br>
            {{-- Submit --}}
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/auth.js') }}"></script>