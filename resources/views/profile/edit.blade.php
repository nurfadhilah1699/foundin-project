@extends('layouts.main')

    <style>
    #profileTab .nav-link {
      color: grey;
      font-weight: 600;
    }

    #profileTab .nav-link.active {
      color: #008374;
    }
    </style>

@section('hero')
    <!-- Page Title -->
<div class="page-title">
    <nav class="breadcrumbs">
      {{--  --}}
    </nav>
</div>
@endsection

@section('content')
<section id="contact" class="contact section">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-white rounded shadow-lg p-4">
                <div class="container section-title">
                    <h2>Profil Pengguna</h2>
                    <p class="text-muted mb-0">Kelola informasi profil dan pengaturan akun Anda</p>
                </div>

                <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-pane" type="button" role="tab" aria-controls="profile-pane" aria-selected="true">Profil</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security-pane" type="button" role="tab" aria-controls="security-pane" aria-selected="false">Keamanan</button>
                    </li>
                </ul>

                <div class="tab-content" id="profileTabContent">
                    <!-- Profile Tab -->
                    @include('profile.partials.update-profile-information-form')

                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security-pane" role="tabpanel" tabindex="0" aria-labelledby="security-tab">
                        @include('profile.partials.update-password-form')

                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    @if (session('status') === 'verification-link-sent')
        toastr.success("Link verifikasi baru sudah dikirim ke email kamu.");
    @endif

    document.getElementById('avatarUpload').addEventListener('change', function(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(event){
            document.getElementById('avatarPreview').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });

</script>

@endsection