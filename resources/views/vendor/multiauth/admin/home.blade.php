<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/styleindex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="apple-touch-icon" href="favicon-32x32">
    <link rel="shortcut icon" href="favicon.ico">

	<link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="../assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../assets/scss/style.css">
    <link rel="stylesheet" href="../assets/css/lib/chosen/chosen.min.css">

    <style>

    </style>


</head>

<body style="background: url('../images/bg.png'); background-size:cover ;font-family: cursive; padding-top:65px;">

<div class="cover">
	<h1 style="font-size: 60px ">WELCOME TO <br> ~PATIENT'S RECORDS~ </h1>

	<p style="padding-left: 700px; color:aqua">Management Information System</p>


    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

    @admin('super')
        <a class="btn btn-primary" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
        <a class="btn btn-primary" href="{{ route('admin.roles') }}">Roles</a>
        <a class="btn btn-primary" href="{{ route('employee.create') }}">Register Employee</a>
    @endadmin

    @admin('receptionist')
        <a class="btn btn-primary" href="{{ route('patient.create') }}">Register a patient</a>
        <a class="btn btn-primary" href="{{ route('patient.index') }}">Search</a>
    @endadmin
    @admin('accountant')
        <a class="btn btn-primary" href="{{ route('accountant.index') }}">Search</a>
    @endadmin
    @admin('nurse')
    <a class="btn btn-primary" href="{{ route('nurse.index') }}">Search</a>
    @endadmin
    @admin('doctor')
    <a class="btn btn-primary" href="{{ route('doctor.index') }}">Search</a>
    @endadmin
    @admin('pharmacist')
    <a class="btn btn-primary" href="{{ route('pharmacist.index') }}">Search</a>
    @endadmin
    @admin('labtech')
    <a class="btn btn-primary" href="{{ route('lab.index') }}">Search</a>
    @endadmin


    <a class="btn btn-outline-success" href="../admin/logout"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="float:right">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>

</body>
</html>
