<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($user)
                        @include('profile.partials.update-profile-information-form', ['user' => $user])
                    @else
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("You are not logged in. Please log in to update your profile information.") }}
                        </p>
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($user)
                        @include('profile.partials.update-password-form', ['user' => $user])
                    @else
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("You are not logged in. Please log in to update your password.") }}
                        </p>
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($user)
                        @include('profile.partials.delete-user-form', ['user' => $user])
                    @else
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("You are not logged in. Please log in to delete your account.") }}
                        </p>
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
