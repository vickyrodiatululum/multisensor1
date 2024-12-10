<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Buat Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Masukan informasi akun dan alamat email.') }}
        </p>
    </header>

    <form method="POST" action="{{ route('admin.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('POST')
        {{-- role --}}
        <div>
            <x-input-label for="role" :value="__('role')" />
            <select id="role" name="role" type="number" step="any"
                class="mt-1 block rounded-md border-gray-300  focus:border-indigo-500 focus:ring-indigo-500 shadow-sm w-full"
                required autofocus>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</section>
