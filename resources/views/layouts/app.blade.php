<!doctype html>
<html @php(language_attributes())>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php(do_action('get_header'))
	@php(wp_head())

	{{-- Fonts --}}
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

	@vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body @php(body_class())>
	@php(wp_body_open())

	<div id="app">
		<a class="sr-only focus:not-sr-only" href="#main">
			{{ __('Skip to content', 'sage') }}
		</a>

		@include('sections.header')

		<main id="main" class="main -menu-mt">
			@yield('content')
		</main>

		<!--   @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif -->

		@include('sections.footer')
	</div>

	@php(do_action('get_footer'))
	@php(wp_footer())
</body>

</html>