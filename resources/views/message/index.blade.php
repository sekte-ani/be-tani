@extends('layouts.main', ['title' => 'Pesan', 'page_heading' => 'Pesan'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	@foreach ($message as $item)
		<div class="card border">
			<h5 class="card-header">{{ $item->user->email }} - {{ $item->status == '1' ? 'Sudah Dibaca' : 'Belum Dibaca' }}</h5>
			<div class="card-body">
				<p class="card-text">{{ $item->subject }}</p>
				<form action="/pesan/{{ $item->id }}">
					@method('put')
					@csrf
					<button class="btn btn-primary">Baca Pesan</button>
				</form>
				{{-- <a href="#" class="btn btn-primary">Baca Pesan</a> --}}
			</div>
		</div>
	@endforeach
	{{ $message->links() }}
</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('modul.modal.create')
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
