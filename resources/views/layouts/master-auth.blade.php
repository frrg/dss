<!DOCTYPE html>

<html lang="en">

<head>
	<base href="./">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="Belajar membuat program untuk skripsi">
	<meta name="author" content="Feri">
	<meta name="keyword" content="Aplikasi DSS">
	<title>@yield('title')</title>

	<link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet">
	<meta name="robots" content="noindex">
</head>

<body class="c-app flex-row align-items-center">
	@yield('content')

	<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
	<script>
		document.addEventListener("DOMContentLoaded", function(event) {
			setTimeout(function() {
				document.body.classList.remove('c-no-layout-transition')
			}, 2000);
		});
	</script>
</body>

</html>