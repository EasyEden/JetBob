    @include('includes/bootstrap')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JetBob</title>
</head>
<body class="w-100">
    <header class="w-100 bg-dark text-white p-3 d-flex">
        {{-- Title --}}
        <div class="text-left w-50">
            <h1><a class="text-decoration-none text-white" href="/">TITLE</a></h1>
        </div>
        {{-- Auth --}}
        <div class="text-right w-50 d-flex justify-content-end">
            {{-- Login --}}
            <div class="m-1">
                <button class="btn"><a class="text-decoration-none text-dark" href="/login">Login</a></button>
            </div>
            {{-- Register --}}
            <div class="m-1">
                <button class="btn"><a class="text-decoration-none text-dark" href="/register">Register</a></button>
            </div>
            {{-- Logged in --}}
            <div class="m-1 d-none">
                <button class="btn">Welcome (user)!</button>
            </div>
        </div>
    </header>