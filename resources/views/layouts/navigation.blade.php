<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
             </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="{{ url('/') }}" class="text-lg font-bold">Event Management</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('events.index') }}" class="text-gray-900 hover:bg-gray-100 hover:text-gray-900">Events</a>
                        @auth
                            <a href="{{ route('logout') }}" class="text-gray-900 hover:bg-gray-100 hover:text-gray-900">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-900 hover:bg-gray-100 hover:text-gray-900">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
