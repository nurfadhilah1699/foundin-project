<div class="tab-pane fade show active" id="profile-pane" role="tabpanel" tabindex="0" aria-labelledby="profile-tab">
  <div class="row">
    <div class="col-md-4 text-center mb-4">
      <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="position-relative d-inline-block mb-3">
          <img src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('impact/assets/img/default-avatar-icon.jpg') }}"
               alt="Avatar"
               class="rounded-circle border border-3 border-light shadow"
               style="width: 150px; height: 150px; object-fit: cover;"
               id="avatarPreview">
          <label for="avatarUpload" class="position-absolute bottom-0 end-0 text-white rounded-circle p-2 mb-2 me-1"
                 style="cursor: pointer; background-color: #008374; width: 40px; height: 40px;">
            <i class="bi bi-camera"></i>
          </label>
          <input type="file" id="avatarUpload" name="profile_picture" style="display: none;" accept="image/*">
        </div>
        <h4 id="profileName">{{ $user->name }}</h4>
        <p class="text-muted">Anggota sejak {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F Y') }}</p>
    </div>

    <div class="col-md-8">
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required autofocus autocomplete="name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required autofocus autocomplete="email">

          @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning mt-3" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Email kamu belum diverifikasi.</strong>
                        <p class="mb-0">Klik "Resend" untuk kirim ulang link verifikasi.</p>
                    </div>
                    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary" style="border-color:#008374; color:#008374; background-color: transparent;"
                            onmouseover="this.style.backgroundColor='#008374'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#008374';">
                            Resend
                        </button>
                    </form>
                </div>
            </div>
        @endif

        </div>
        <div class="mb-3">
          <label for="bio" class="form-label">Bio</label>
          <textarea class="form-control" id="bio" name="bio" rows="4">{{ $user->bio }}</textarea>
        </div>
        <div class="d-flex justify-content-end gap-2 mt-4">
          <button type="submit" class="btn btn-primary" style="background-color:#008374; border-color:#008374;">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
