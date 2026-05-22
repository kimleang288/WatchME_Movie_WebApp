<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-password-field
                name="current_password"
                label="Current Password"
                placeholder="Enter your current password"
                autocomplete="current-password"
                :hasError="$errors->has('current_password')"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-password-field
                name="password"
                label="New Password"
                placeholder="Enter your new password"
                autocomplete="new-password"
                :hasError="$errors->has('password')"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-password-field
                name="password_confirmation"
                label="Confirm New Password"
                placeholder="Re-enter your new password"
                autocomplete="new-password"
                :hasError="$errors->updatePassword->has('password_confirmation')"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
