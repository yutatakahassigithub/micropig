<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
               

        <!-- Settings Dropdown -->
<div class="hidden sm:flex sm:items-center sm:ml-6">
    @if(Auth::check())
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              
                    <div>{{ Auth::user()->name }}</div>
            <div class="hidden sm:flex sm:items-center sm:ml-6 ml-auto mr-8">
        </x-slot>
            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">login</a>
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">register</a>
    @endif
</div>
    

  