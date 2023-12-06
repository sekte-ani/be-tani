@extends('layouts.main', ['title' => 'Pesan', 'page_heading' => 'Pesan'])

@section('content')
@include('utilities.alert-flash-message')
<a class="btn btn-danger" href="/pesan">Kembali</a>
<section class="row">
	<h4 class="mt-4 w-75">Subjek: {{ $message->subject }}</h4>
    <p>Dari: {{ $message->user->email }}</p>
    <h5 class="mt-4">Pesan</h5>
    <p class="mb-3 w-50">{{ $message->message }}</p>
</section>
<a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $message->user->email }}" class="btn btn-success mb-5 " href="">Balas Pesan</a>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('modul.modal.create')
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
