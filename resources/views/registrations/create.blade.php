@extends('layouts.app')

@section('title', 'Form Pendaftaran')

@section('content')
    <div class="row g-4 align-items-stretch">
        <section class="col-lg-7" aria-labelledby="registration-heading">
            <div class="panel h-100">
                <h2 class="h4 mb-2" id="registration-heading">Form Pendaftaran</h2>
                <p class="text-secondary mb-4">Lengkapi data diri untuk mendaftar sebagai peserta seminar.</p>

                @if (session('registration_success'))
                    <div class="alert alert-success" role="status">
                        <h3 class="h6 alert-heading">Pendaftaran berhasil!</h3>
                        <p class="mb-0">Terima kasih telah mendaftar. Data Anda berhasil disimpan sebagai peserta seminar.</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Periksa kembali data yang Anda masukkan. Ada {{ $errors->count() }} kesalahan pada formulir.
                    </div>
                @endif

                <form action="{{ route('registrations.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            minlength="3"
                            maxlength="255"
                            autocomplete="name"
                            required
                            aria-describedby="name-error"
                        >
                        @error('name')
                            <div class="invalid-feedback" id="name-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            maxlength="255"
                            autocomplete="email"
                            required
                            aria-describedby="email-error"
                        >
                        @error('email')
                            <div class="invalid-feedback" id="email-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birth_date" class="form-label fw-semibold">Tanggal Lahir</label>
                        <input
                            type="date"
                            class="form-control @error('birth_date') is-invalid @enderror"
                            id="birth_date"
                            name="birth_date"
                            value="{{ old('birth_date') }}"
                            max="2006-12-31"
                            autocomplete="bday"
                            required
                            aria-describedby="birth-date-help birth-date-error"
                        >
                        <div class="form-text" id="birth-date-help">Peserta harus lahir pada atau sebelum 31 Desember 2006.</div>
                        @error('birth_date')
                            <div class="invalid-feedback" id="birth-date-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="form-label fw-semibold">Nomor HP</label>
                        <div class="input-group">
                            <span class="input-group-text" aria-label="Kode negara Indonesia">+62</span>
                            <input
                                type="tel"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="8123456789"
                                inputmode="numeric"
                                pattern="[1-9][0-9]{7,12}"
                                minlength="8"
                                maxlength="13"
                                autocomplete="tel-national"
                                required
                                aria-describedby="phone-help phone-error"
                            >
                            @error('phone')
                                <div class="invalid-feedback" id="phone-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text" id="phone-help">Masukkan 8–13 digit tanpa awalan 0 atau +62.</div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </section>

        <aside class="col-lg-5" aria-labelledby="seminar-heading">
            <div class="seminar-card h-100">
                <p class="eyebrow mb-2">Catat tanggalnya</p>
                <h2 class="h4 mb-4" id="seminar-heading">Informasi Seminar</h2>

                <dl class="seminar-details">
                    <div>
                        <dt>Tanggal</dt>
                        <dd>21 Maret 2025</dd>
                    </div>
                    <div>
                        <dt>Waktu</dt>
                        <dd>09:00–12:00 WIB</dd>
                    </div>
                    <div>
                        <dt>Lokasi</dt>
                        <dd>Auditorium Kampus 1 Politeknik Negeri Madiun</dd>
                    </div>
                    <div>
                        <dt>Pembicara</dt>
                        <dd>Ardian Prima Atmaja, S.Kom., M.Cs.<br><span class="text-secondary">Cloud Computer Analyst</span></dd>
                    </div>
                </dl>

                <div class="alert alert-info mb-0" role="note">
                    Kuota terbatas. Daftarkan diri Anda untuk mendapatkan akses ke seminar teknologi di PNM.
                </div>
            </div>
        </aside>
    </div>
@endsection
