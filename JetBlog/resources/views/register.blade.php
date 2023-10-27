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
            <input id="email" name="email" type="text" placeholder="Email"><br><br>
            {{-- Password --}}
            <label class="mt-3" for="password">Password:</label><br>
            <input id="password" name="password" type="password" placeholder="Password"><input onclick="showPassword()" id="showPassword" type="checkbox"><br>
            <label class="mt-2" for="password">Comfirm Password:</label><br>
            <input id="confrimPassword" name="confirmPassword" type="password" placeholder="Confirm Password"><br><br>
            {{-- Submit --}}
            <button class="btn" type="submit">Register</button>
        </form>
    </div>
</div>

{{-- Script --}}
<script>
    function showPassword() {
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const showPassword = document.getElementById("showPassword");
        
        if (showPassword.checked) {
            password.type = "text";
            confrimPassword.type = "text";
        } else {
            password.type = "password"
            confrimPassword.type = "password";
        }
    }
</script>
