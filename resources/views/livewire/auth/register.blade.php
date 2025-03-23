
<!-- HTML permanece o mesmo -->

<div class="flex flex-col gap-6">
    <button type="button" wire:click="testMethod" class="px-4 py-2 bg-gray-200">
        Test Livewire
    </button>
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
    wire:model="name"
    :label="__('Name')"
    type="text"
    required
    autofocus
    autocomplete="name"
    :placeholder="__('Full name')"
/>
@error('name') <div class="mt-1 text-red-500">{{ $message }}</div> @enderror

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            :label="__('Email address')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('Password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Password')"
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('Confirm password')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('Confirm password')"
        />

        @if (session()->has('message'))
    <div class="p-4 mb-4 text-green-900 bg-green-100">
        {{ session('message') }}
    </div>
@endif

        <div class="flex items-center justify-end">
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded">
                {{ __('Create account') }}
            </button>
        </div>
    </form>

    <div class="space-x-1 text-sm text-center text-zinc-600">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>
