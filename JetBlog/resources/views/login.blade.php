@include('includes/header')

{{-- Login block --}}
<div class="w-100 d-flex justify-content-center mt-5">
    <div class="bg-light w-25 d-flex justify-content-center p-5 rounded border border-dark">
        {{-- Login Form --}}
        <form action="{{ route ('login') }}" method="POST">
            @csrf
            {{-- Username --}}
            <label for="username">Username:</label><br>
            <input id="username" name="username" type="text" placeholder="Username"><br>
            {{-- Password --}}
            <label class="mt-3" for="password">Password:</label><br>
            <input id="password" name="password" type="text" placeholder="Password"><br><br>
            {{-- Submit --}}
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</div>