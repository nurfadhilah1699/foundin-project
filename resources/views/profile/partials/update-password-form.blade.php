<div class="border-top pt-4">
    <h4>Ubah Password</h4>
    <p>Pastikan untuk menggunakan password yang kuat dan unik</p>

    <form id="passwordForm" action="{{ route('password.update') }}" method="POST">
        @csrf
        @method("PUT")
        <div class="mb-3">
            <label for="currentPassword" class="form-label">Password Saat Ini</label>
            <input type="password" class="form-control" id="currentPassword" name="current_password" autocomplete="current-password">
        </div>
        <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="newPassword" name="password" autocomplete="new-password">
            <div class="form-text">Password harus terdiri dari minimal 8 karakter dengan kombinasi huruf, angka, dan simbol.</div>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" id="confirmPassword" name="password_confirmation" autocomplete="new-password">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" id="changePasswordBtn" style="background-color:#008374; border-color:#008374;">Ubah Password</button>

            @if (session('status') === 'password-updated')
                <p class="mb-0 text-muted" id="savedMessage">Perubahan disimpan.</p>
            @endif
        </div>
    </form>
</div>