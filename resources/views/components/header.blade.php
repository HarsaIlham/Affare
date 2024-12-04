<div class="bg-indigo-800 relative select-none lg:flex lg:items-stretch w-full">
    <div class="container flex">
        <div class="flex flex-no-shrink items-stretch h-12">
            <p
                class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">
                Ini navbar</p>
        </div>
        <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
            @if (Auth::guard('company')->check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Logout</button>
                </form>
            @elseif (Auth::guard('seeker')->check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Logout</button>
                </form>
            @else
                <a href="{{ route('role-login') }}"
                    class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Login</a>
            @endif
            <a href="/"
                class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Home</a>
        </div>
    </div>
</div>
