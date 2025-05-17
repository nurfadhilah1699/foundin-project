{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
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
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

<div class="border-top pt-4">
    <h4>Ubah Password</h4>
    <p>Pastikan untuk menggunakan password yang kuat dan unik</p>

    <form id="passwordForm">
        <div class="mb-3">
            <label for="currentPassword" class="form-label">Password Saat Ini</label>
            <input type="password" class="form-control" id="currentPassword">
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="newPassword">
            <div class="form-text">Password harus terdiri dari minimal 8 karakter dengan kombinasi huruf, angka, dan simbol.</div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirmPassword">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" id="changePasswordBtn" style="background-color:#008374; border-color:#008374;">Ubah Password</button>
        </div>
    </form>
</div>