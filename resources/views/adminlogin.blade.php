<!DOCTYPE html> 
    <html lang="en"> 
        <head> 
            <meta charset="UTF-8"> 
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
            <title>Admin Login | ByteBazaar</title> 
            @vite(['resources/css/app.css','resources/js/app.js']) 
        </head>
        <body class="w-full h-screen flex flex-col flex-1">
            @include('common/adminnavbar')
            <div class="mt-16 h-full border flex items-center justify-center">
                <form class="w-1/3" action="admin-login" method="post">
                    <div class="text-center text-2xl font-medium mb-10">ADMIN LOGIN</div>
                    @csrf
                    <div class="flex flex-col  border rounded-lg p-10 gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="email">Email</label>
                            <input name="email" id="email" class=" rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="email" placeholder="Email" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="password">Password</label>
                            <input name="password" id="password" class="rounded-md p-2 border-2 border-gray-900/10 focus:ring-0 focus:border-gray-500" type="password" placeholder="Password" required>
                        </div>
                        <button class="bg-slate-900 text-white font-medium py-2 rounded-md hover:bg-slate-600" type="submit">Login</button>
                        <div class="text-center">
                            Don't have an account ? <span>
                                <a class="text-blue-500" href="/admin-register">
                                    Register
                                </a>
                            </span>
                        </div>
                        <div >
                            @if($errors->any())
                                    <div class="bg-red-500 animate-fade-out px-4 py-2 text-white text-lg rounded-md fade-out">
                                        {{ $errors->first() }} !!!
                                    </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </body>

    </html>