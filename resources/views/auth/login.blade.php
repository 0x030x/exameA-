<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href=" {{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/a.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/jquery.js') }}" rel="stylesheet" type="text/javascipt" />
    <link href="{{ asset('vendor/jquery.min.js') }}" rel="stylesheet" type="text/javascipt" />

<body>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form method="POST" action="{{ route('login.post') }}">

                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    <p class="text-white-50 mb-5">Insira suas credenciais</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="typeEmailX" name="email" value="{{ old('email') }}" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX" >Email</label>
                                        @if ($errors->has('email'))
                                            <label style="color"> {{ $errors->first('email') }}</label>
                                        @endif
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Senha</label>
                                        @if ($errors->has('password'))
                                            <label style="color"> {{ $errors->first('password') }}</label>
                                        @endif
                                    </div>



                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>



                            </div>

                            <div>
                                <p class="mb-0">NÃ£o tem uma conta? <a href="/register"
                                        class="text-white-50 fw-bold">Registre-se</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
