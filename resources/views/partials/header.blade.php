<header class="z-[3] w-full fixed h-[65px] flex justify-center bg-white" x-data="{ open: false }">
    <div class="w-full px-4 max-w-[1440px] flex justify-between items-center">
        <div>
            <a href="{{ route('homepage') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="logo" class="h-[60px]">
            </a>
        </div>
        <div class="flex justify-between gap-6">
            <nav class="hidden md:block">
                <ul class="flex justify-end gap-20 text-lg">
                    <li><a href="{{ route('homepage') }}" class="{{ request()->is('/') ? 'opacity-90' : '' }} hover:opacity-100">Home</a></li>
                    @if(session()->get('role_id') == 1)
                        <li><a href="{{ route('add') }}" class="{{ request()->is('/add') ? 'opacity-90' : '' }} hover:opacity-100">Add Car</a></li>
                    @endif
                    <li><a href="{{ route('courses') }}" class="{{ request()->is('/rent') ? 'opacity-90' : '' }} hover:opacity-100 ">Car</a></li>
                    @if(session()->get('role_id') == 1)
                        <li><a href="{{ route('transaction') }}" class="{{ request()->is('/transaction') ? 'opacity-90' : '' }} hover:opacity-100">Transactions</a></li>
                    @else
                        <li><a href="{{ route('transaction') }}" class="{{ request()->is('/transaction') ? 'opacity-90' : '' }} hover:opacity-100">Transaction</a></li>
                    @endif
                </ul>
            </nav>
            <div class="items-center hidden gap-3 md:flex">
                @if(session()->get('isLogged'))
                    <a href="{{ route('logout') }}" class="text-lg hover:opacity-90 active:opacity-85">Logout</a>
                @endif
            </div>
            <button @click="open = !open" class="block md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
    <div x-show="open" @click.away="open = false" class="w-[400px] lg:hidden h-screen bg-white">
        <nav>
            <ul class="flex flex-col items-end gap-3 px-4 pr-6 mt-4 text-lg">
                <li><a href="{{ route('homepage') }}" class="hover:opacity-90 active:opacity-85">Home</a></li>
                @if(session()->get('role_id') == 1)
                    <li><a href="{{ route('add') }}" class="hover:opacity-90 active:opacity-85">Add Car</a></li>
                @endif
                <li><a href="/cars" class="hover:opacity-90 active:opacity-85">All Car</a></li>
                @if(session()->get('role_id') == 1)
                    <li><a href="{{ route('transaction') }}" class="hover:opacity-90 active:opacity-85">Transactions</a></li>
                @else
                    <li><a href="{{ route('transaction') }}" class="hover:opacity-90 active:opacity-85">My Transaction</a></li>
                @endif
                <li class="text-lg font-semibold">{{ session()->get("name") }}</li>
                @if(session()->get('isLogged'))
                    <li><a href="{{ route('logout') }}" class="text-lg hover:opacity-90 active:opacity-85">Logout</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>