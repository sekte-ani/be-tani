@extends('layouts.main', ['title' => 'Modul', 'page_heading' => 'Edit Data Modul'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
		<form action="/modul/{{ $document->id }}" method='POST' enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" name='title' id="title" placeholder="Masukkan judul modul.." value="{{ old('title', $document->title) }}">
                    </div>
                    <div class="mb-3">
                        @if ($document->modul)
                        <input type="hidden" name="oldImage" value="{{ $document->modul }}">
                       <a href="http://127.0.0.1:8000/storage/{{ $document->modul }}"><i class="bi bi-file-earmark-font-fill"></i>{{ $document->modul }}</a><br>
                        @endif
                        <label for="modul" class="form-label mt-3">File Modul</label>
                        <input type="file" name="modul" id="modul" class="form-control">
                    </div>
                    
                </div>
                

            </div>
            <div class="modal-footer">
    
                <button type="submit" class="btn btn-success" name="submit">Edit</button>
            </div>
        </form>
			
		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>
		{{-- Paginator --}}
		{{-- {{ $data->withQueryString()->links() }} --}}
  </div>
</div>

</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('modul.modal.create')
{{-- @include('modul.modal.edit') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
