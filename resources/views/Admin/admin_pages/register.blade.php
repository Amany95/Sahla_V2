
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sahla | Login</title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Sahla</h1>

            </div>
            <h3>Welcome to sahla</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            {!! Form::open(['route'=>['admin.register'],'method'=>'POST'],array('class'=>'m-t')) !!}
                <div class="form-group">
                   
                    {!! Form::email('email',null,array('class'=>'form-control','required'=>'required','placeholder' => 'Email')) !!}

                                                  
                </div>
                <div class="form-group">
                    
                    {!! Form::password('password',array('class'=>'form-control','required'=>'required','placeholder' => 'Paswoord')) !!}
                     
                </div>
                {!! Form::submit('register',array('class'=>'btn btn-primary block full-width m-b')) !!}
              

                <a href=""><small>Forgot password?</small></a>
                    
{!! Form::close() !!}           
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="{{ asset('admin/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

</body>

</html>
