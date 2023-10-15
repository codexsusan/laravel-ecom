<nav class="w-full h-16 z-100 fixed bg-slate-900/10 flex justify-between items-center px-20">
    <h1 class="text-xl font-bold text-slate-900">
        BYTEBAZAAR
    </h1>
    <div class="flex gap-x-8">
        <a href="/dashboard" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0md:hover:text-blue-700 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            Home
        </a>
        @if(!session()->has('adminId'))
        <a href="/admin-login" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            Login
        </a>
        <a href="/admin-register" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
            Sign up
        </a>
        @endif
    </div>
</nav>