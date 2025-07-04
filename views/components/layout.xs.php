<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App</title>
	
	<link rel="shortcut icon" href="{{ asset('meta/favicon.ico') }}" type="image/x-icon">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/fuxcel/css/fuxcel.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	
	<script src="{{ asset('assets/plugins/fuxcel/js/fuxcel.js') }}" defer></script>
	<script src="{{ asset('assets/js/app.js') }}" defer></script>
</head>

<body>
	<main>
		@yield("body")
	</main>
</body>
</html>
