@include('includes/header')

{{-- Register block --}}
<div class="w-100 d-flex justify-content-center mt-5">
    <div class="bg-light w-25 d-flex justify-content-center p-5 rounded border border-dark">
        {{-- Register Form --}}
        <form action="{{ route ('register') }}" method="POST">
            @csrf
            {{-- Username --}}
            <label for="username">Username:</label><br>
            <input id="username" name="username" type="text" placeholder="Username"><br>
            {{-- Email --}}
            <label class="mt-2" for="email">Email:</label><br>
            <input id="email" name="email" type="text" placeholder="Email"><br>
            {{-- Password --}}
            <label class="mt-3" for="password">Password:</label><br>
            <input id="password" name="password" type="password" placeholder="Password"><br>
            <label class="mt-2" for="password">Comfirm Password:</label><br>
            <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password"><br>
            <input id="showPasswordBox" type="checkbox"><label style="margin-left: 5px; color: grey;" for="showPasswordBox">Show Password</label><br><br>
            {{-- Submit --}}
            <button class="btn" type="submit">Register</button>
        </form>
    </div>
</div>

{{-- Auth Script --}}
<script src="{{ asset('js/auth.js') }}"></script>
