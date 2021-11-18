<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
	<div class="c-sidebar-brand d-lg-down-none">
		<div class="c-sidebar-brand-full">
			Decision Support System
		</div>
		<div class="c-sidebar-brand-minimized">
			DSS
		</div>
	</div>
	<ul class="c-sidebar-nav">
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="/">
				<svg class="c-sidebar-nav-icon">
					<use xlink:href="{{ asset('icons/svg/free.svg#cil-speedometer') }}"></use>
				</svg> Dashboard
			</a>
		</li>
		
		<li class="c-sidebar-nav-item">
			<a class="c-sidebar-nav-link" href="{{ route('kriteria.index') }}">
				<svg class="c-sidebar-nav-icon">
					<use xlink:href="{{ asset('icons/svg/free.svg#cil-description') }}"></use>
				</svg> Kriteria
			</a>
		</li>
	</ul>
	<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>