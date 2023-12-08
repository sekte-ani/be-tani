{{-- Struktur view navigasi --}}
<div class="sidebar-header">
	<div class="d-flex justify-content-between">
		<div class="logo">
			<a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
		</div>
		<div class="toggler">
			<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
		</div>
	</div>
</div>
<div class="sidebar-menu">
	<ul class="menu">
		<li class="sidebar-title">Menu</li>
		{{-- Dashboard --}}
		<li class="sidebar-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
			<a href="/" class='sidebar-link'>
				<i class="bi bi-grid-fill"></i>
				<span>Dashboard</span>
			</a>
		</li>

		{{-- <li class="sidebar-title"><i class="bi bi-menu-button-wide"></i></li> --}}
		
		<li class="sidebar-item {{ request()->routeIs('modul*') ? 'active' : '' }}">
			<a href="/modul" class='sidebar-link'>
				<i class="bi bi-file-earmark-font-fill"></i>
				<span>Modul</span>
			</a>
		</li>
		<li class="sidebar-item {{ request()->routeIs('pesan*') ? 'active' : '' }}">
			<a href="/pesan" class='sidebar-link'>
				<i class="bi bi-file-earmark-font-fill"></i>
				<span>Pesan</span>
			</a>
		</li>
		
		{{-- <li class="sidebar-item {{ request()->routeIs('pengeluaran.*') ? 'active' : '' }}">
			<a href="/pengeluaran" class='sidebar-link'>
				<i class="bi bi-briefcase-fill"></i>
				<span>Pengeluaran</span>
			</a>
		</li> --}}
		{{-- Logout --}}
		<li class="sidebar-item">
			<form method="POST" action="/logout" id="logout">
				@csrf

				<a href="" class='sidebar-link'>
					<i class="bi bi-box-arrow-left text-danger"></i>
					<span>Logout</span>
				</a>
			</form>
		</li>

	</ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
