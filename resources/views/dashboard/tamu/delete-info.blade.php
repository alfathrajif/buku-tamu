@extends('dashboard.layouts.main')
@section('title', 'Tamu - Dashboard')
@section('content')
<div class="delete-info-wrapper w-full flex justify-center items-center">
    <div class="text-center">
        <div class="mb-5">
            <h2 class="text-3xl font-bold mb-2">Kegiatan <u>{{ $event->name }}</u> tidak dapat dibatalkan!</h2>
            <p class="text-xl italic">
                Karena memiliki jumlah tamu,
                keluarkan tamu terlebih dahulu.
            </p>
        </div>
        <a href="/dashboard/event/detail/{{ $event->id }}" class="btn">Lihat Detail Tamu</a>
        <a href="/dashboard/event" class="btn">Kembali</a>
    </div>
</div>
@endsection
