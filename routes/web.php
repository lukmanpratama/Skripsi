<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\Guest\Beranda::class)->name('guest.beranda');
Route::get('/company_profile', \App\Livewire\Guest\CompanyProfile::class)->name('guest.company_profile');
Route::get('/toko_online', \App\Livewire\Guest\TokoOnline::class)->name('guest.toko_online');
Route::get('/custom_website', \App\Livewire\Guest\WebsiteRequest::class)->name('guest.custom_website');
Route::get('/custom_aplikasi', \App\Livewire\Guest\AplikasiRequest::class)->name('guest.custom_aplikasi');
Route::get('/skripsi_tesis', \App\Livewire\Guest\SkripsiTesis::class)->name('guest.skripsi_tesis');

Route::get('/portofolio', \App\Livewire\Guest\Portofolio::class)->name('guest.portofolio');
Route::get('/tentang', \App\Livewire\Guest\Tentang::class)->name('guest.tentang');
Route::get('/harga', \App\Livewire\Guest\Harga::class)->name('guest.harga');
Route::get('/kontak', \App\Livewire\Guest\Kontak::class)->name('guest.kontak');

Route::get('/login', \App\Livewire\Auth\Login::class)->name('auth.login')->middleware('guest');
Route::get('/registrasi', \App\Livewire\Auth\Registrasi::class)->name('auth.registrasi')->middleware('guest');
Route::get('/registrasi_instansi', \App\Livewire\Auth\RegistrasiInstansi::class)->name('auth.registrasi.instansi')->middleware('guest');
Route::get('/registrasi_perorangan', \App\Livewire\Auth\RegistrasiPerorangan::class)->name('auth.registrasi.perorangan')->middleware('guest');
Route::post('/logout', action: \App\Http\Controllers\Logout::class)->name('auth.logout');

Route::group(['middleware' => ['auth', 'cekrole:admin']], function(){
    Route::get('/admin', \App\Livewire\Admin\AdminBeranda::class)->name('admin.beranda');
    Route::get('/admin/user', \App\Livewire\Admin\AdminUser::class)->name('admin.user');
    Route::get('/admin/pemilik', \App\Livewire\Admin\AdminPemilik::class)->name('admin.pemilik');
    Route::get('/admin/pegawai', \App\Livewire\Admin\AdminPegawai::class)->name('admin.pegawai');
    Route::get('/admin/proyek', \App\Livewire\Admin\AdminProyek::class)->name('admin.proyek');
    Route::get('/admin/proyek/{id}', \App\Livewire\Admin\AdminDetilProyek::class)->name('admin.proyek.detil');
    Route::get('/admin/proyek/{id}/tim', \App\Livewire\Admin\AdminProyekTim::class)->name('admin.proyek.tim');
    Route::get('/admin/proyek/{id}/tugas', \App\Livewire\Admin\AdminProyekTugas::class)->name('admin.proyek.tugas');
    Route::get('/admin/proyek/{id}/tugas/{tugas_id}/aktivitas', \App\Livewire\Admin\AdminProyekTugasAktivitas::class)->name('admin.proyek.tugas.aktivitas');
    Route::get('/admin/proyek/{id}/waktu', \App\Livewire\Admin\AdminProyekWaktu::class)->name('admin.proyek.waktu');
    Route::get('/admin/proyek/{id}/biaya', \App\Livewire\Admin\AdminProyekBiaya::class)->name('admin.proyek.biaya');
    Route::get('/admin/proyek/{id}/estimasi', \App\Livewire\Admin\AdminProyekEstimasi::class)->name('admin.proyek.estimasi');
    Route::get('/admin/kontrak', \App\Livewire\Admin\AdminKontrakKerja::class)->name('admin.kontrak');
    Route::get('/admin/dokumen', \App\Livewire\Admin\AdminDokumen::class)->name('admin.dokumen');
    Route::get('/admin/tagihan', \App\Livewire\Admin\AdminTagihan::class)->name('admin.tagihan');
    Route::get('/admin/profile', \App\Livewire\Admin\AdminProfile::class)->name('admin.profile');

});
Route::group(['middleware' => ['auth', 'cekrole:manajer']], function(){
    Route::get('/manajer', \App\Livewire\Manajer\ManajerBeranda::class)->name('manajer.beranda');
    Route::get('/manajer/proyek', \App\Livewire\Manajer\ManajerProyek::class)->name('manajer.proyek');
    Route::get('/manajer/konsultasi', \App\Livewire\Manajer\ManajerKonsultasi::class)->name('manajer.konsultasi');
    Route::get('/manajer/kontrak', \App\Livewire\Manajer\ManajerKontrak::class)->name('manajer.kontrak');
    Route::get('/manajer/tugas', \App\Livewire\Manajer\ManajerTugas::class)->name('manajer.tugas');
    Route::get('/manajer/tim', \App\Livewire\Manajer\ManajerTim::class)->name('manajer.tim');
    Route::get('/manajer/waktu', \App\Livewire\Manajer\ManajerWaktu::class)->name('manajer.waktu');
    Route::get('/manajer/estimasi', \App\Livewire\Manajer\ManajerEstimasi::class)->name('manajer.estimasi');
    Route::get('/manajer/biaya', \App\Livewire\Manajer\ManajerBiaya::class)->name('manajer.biaya');
    Route::get('/manajer/aktivitas', \App\Livewire\Manajer\ManajerAktivitas::class)->name('manajer.aktivitas');
    Route::get('/manajer/jadwal', \App\Livewire\Manajer\ManajerJadwal::class)->name('manajer.jadwal');
    Route::get('/manajer/dokumen', \App\Livewire\Manajer\ManajerDokumen::class)->name('manajer.dokumen');
    Route::get('/manajer/profile', \App\Livewire\Manajer\ManajerProfile::class)->name('manajer.profile');

});
Route::group(['middleware' => ['auth', 'cekrole:divisi']], function(){
    Route::get('/divisi', \App\Livewire\Divisi\DivisiBeranda::class)->name('divisi.beranda');
    Route::get('/divisi/proyek', \App\Livewire\Divisi\DivisiProyek::class)->name('divisi.proyek');
    Route::get('/divisi/tugas', \App\Livewire\Divisi\DivisiTugas::class)->name('divisi.tugas');
    Route::get('/divisi/aktivitas', \App\Livewire\Divisi\DivisiAktivitas::class)->name('divisi.aktivitas');
    Route::get('/divisi/jadwal', \App\Livewire\Divisi\DivisiJadwal::class)->name('divisi.jadwal');
    Route::get('/divisi/dokumen', \App\Livewire\Divisi\DivisiDokumen::class)->name('divisi.dokumen');
    Route::get('/divisi/profile', \App\Livewire\Divisi\DivisiProfile::class)->name('divisi.profile');

});
Route::group(['middleware' => ['auth', 'cekrole:pemilik']], function(){
    Route::get('/pemilik', \App\Livewire\Pemilik\PemilikBeranda::class)->name('pemilik.beranda');
    Route::get('/pemilik/proyek', \App\Livewire\Pemilik\PemilikProyek::class)->name('pemilik.proyek');
    Route::get('/pemilik/proyek/{id}', \App\Livewire\Pemilik\PemilikDetilProyek::class)->name('pemilik.proyek.detil');
    Route::get('/pemilik/proyek/{id}/tugas', \App\Livewire\Pemilik\PemilikProyekTugas::class)->name('pemilik.proyek.tugas');
    Route::get('/pemilik/proyek/{id}/tugas/{tugas_id}/aktivitas', \App\Livewire\Pemilik\PemilikProyekTugasAktivitas::class)->name('pemilik.proyek.tugas.aktivitas');
    Route::get('/pemilik/proyek/{id}/tim', \App\Livewire\Pemilik\PemilikProyekTim::class)->name('pemilik.proyek.tim');
    Route::get('/pemilik/proyek/{id}/waktu', \App\Livewire\Pemilik\PemilikProyekWaktu::class)->name('pemilik.proyek.waktu');
    Route::get('/pemilik/proyek/{id}/biaya', \App\Livewire\Pemilik\PemilikProyekBiaya::class)->name('pemilik.pemilik.biaya');
    Route::get('/pemilik/konsultasi', \App\Livewire\Pemilik\PemilikKonsultasi::class)->name('pemilik.konsultasi');
    Route::get('/pemilik/kontrak', \App\Livewire\Pemilik\PemilikKontrak::class)->name('pemilik.kontrak');

    Route::get('/pemilik/dokumen', \App\Livewire\Pemilik\PemilikDokumen::class)->name('pemilik.dokumen');
    Route::get('/pemilik/profile', \App\Livewire\Pemilik\PemilikProfile::class)->name('pemilik.profile');

});
