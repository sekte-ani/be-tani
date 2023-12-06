@extends('layouts.main', ['title' => 'Modul', 'page_heading' => 'Data Modul'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button>
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-2">Judul</th>
					<th class="col-md-2">Modul</th>
					<th class="col-md-3">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $item->title }}</td>
						<td><a href="http://127.0.0.1:8000/storage/{{ $item->modul }}"><i class="bi bi-file-earmark-font-fill"></i></a></td>
						<td>
							<a href='{{ url('modul/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
							{{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditDataModal">
								Edit
							</button> --}}
							<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("modul/".$item->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
			
		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>
		{{-- Paginator --}}
		{{ $data->withQueryString()->links() }}
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
