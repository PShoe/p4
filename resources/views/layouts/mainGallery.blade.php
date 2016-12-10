<!DOCTYPE html>
<html>
	<head>
		<title>Gallery</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<script src="https://use.fontawesome.com/823a48b1f0.js"></script>
        <link href="{!! asset('css/p4.css') !!}" rel="stylesheet" type="text/css" >
    </head>

	<body>
        <header>
            <div class = "landing">
            <a href='/'>
            <h1>What have you been working on?</h1>
            <h3>Build a gallery with friends.</h3>
            <div></a>
		</header>

        <section>
            @yield('content')
        </section>

		<div class= "login">
			<ul>
				@if(Auth::check())
					<li><a href='/artwork/create'>Add a new piece</a></li>
					<li><a href='/logout'>Log out</a></li>
				@else
					<li><a href='/login'>Log in</a></li>
					<li><a href='/register'>Register</a></li>
				@endif
			</ul>
		</div>

		<div class ="footer">
            Pauline Shoemaker, Dynamic Web Applications, Fall Semester 2016.
		</div>
	</body>

</html>
