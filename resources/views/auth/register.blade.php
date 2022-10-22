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
    <link href="{{ asset('vendor/jquery.js') }}" rel="stylesheet" type="text/javascipt" />
    <link href="{{ asset('vendor/jquery.min.js') }}" rel="stylesheet" type="text/javascipt" />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js"
        integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Event Registration Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.post') }}">

                        <div class="form-row">
                            <div class="name">NOME</div>
                            <div class="value">
                                <div class="row row-space">

                                    <div class="input-group-desc">
                                        <input class="input--style-5" type="text" placeholder="NOME COMPLETO"
                                            name="nome" value="{{ old('nome') }}">
                                    </div>
                                    @if ($errors->has('nome'))
                                        <label style="color: red;"> {{ $errors->first('nome') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" placeholder="Insira seu Email"
                                        name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <label style="color: red;"> {{ $errors->first('email') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Senha</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" placeholder="Insira sua Senha"
                                        name="password" value="{{ old('password') }}">
                                    @if ($errors->has('password'))
                                        <label style="color: red;"> {{ $errors->first('password') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">CPF</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="cpf" class="input--style-5" type="text"
                                        placeholder="Insira seu CPF" name="cpf" value="{{ old('cpf') }}">
                                    @if ($errors->has('cpf'))
                                        <label style="color: red;"> {{ $errors->first('cpf') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">SEXO</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="genero">
                                            <option disabled="disabled" selected="selected">Informe</option>
                                            <option {{ old('genero') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                            <option {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option {{ old('genero') == 'Outros' ? 'selected' : '' }}>Outros</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                    @if ($errors->has('genero'))
                                        <label style="color: red;"> {{ $errors->first('genero') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Data de Nascimento</div>
                            <div class="value">
                                <div class="input-group">
                                    <input type="date" name="nascimento" id="nascimento" class="inputUser"
                                        value="{{ old('nascimento') }}" required>
                                    @if ($errors->has('nascimento'))
                                        <label style="color: red;"> {{ $errors->first('nascimento') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Estado Civil</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="estado_civil">
                                            <option disabled="disabled" selected="selected">Informe</option>
                                            <option {{ old('estado_civil') == 'Solteiro(a)' ? 'selected' : '' }}>Solteiro(a)</option>
                                            <option {{ old('estado_civil') == 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                                            <option {{ old('estado_civil') == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                            <option {{ old('estado_civil') == 'Viuvo(a)' ? 'selected' : '' }}>Viuvo(a)</option>
                                        </select>
                                        @if ($errors->has('estado_civil'))
                                            <label style="color: red;"> {{ $errors->first('estado_civil') }}</label>
                                        @endif
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Nivel de Ensino</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="ensino">
                                            <option disabled="disabled" selected="selected">Informe sua Escolaridade</option>
                                            <option {{ old('ensino') == 'Fundamental-Incompleto' ? 'selected' : '' }}>Fundamental-Incompleto</option>
                                            <option {{ old('ensino') == 'Fundamental-Completo' ? 'selected' : '' }}>Fundamental-Completo</option>
                                            <option {{ old('ensino') == 'Médio-Incompleto' ? 'selected' : '' }}>Médio-Incompleto</option>
                                            <option {{ old('ensino') == 'Médio-Completo' ? 'selected' : '' }}>Médio-Completo</option>
                                            <option {{ old('ensino') == 'Superior-Incompleto' ? 'selected' : '' }}>Superior-Incompleto</option>
                                            <option {{ old('ensino') == 'Superior-Completo' ? 'selected' : '' }}>Superior-Completo</option>
                                        </select>
                                        @if ($errors->has('ensino'))
                                            <label style="color: red;"> {{ $errors->first('ensino') }}</label>
                                        @endif
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div id="formacoes">
                                <div class="name">Cursos</div>
                                <div class="value">
                                    <div class="row row-refine">
                                        <div class="col-10">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="formacao[]">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="input-group-desc">
                                                <button class="btn btn--radius-2 btn--blue" id="add-formacao"
                                                    type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->first('formacao.*'))
                                        <label style="color: red;"> {{ $errors->first('formacao.*') }}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div id="experiencias">
                               
                                <div class="name">Experiencia profissional</div>
                                <div class="value">
                                    <div class="row row-refine">
                                        <div class="col-10">
                                            <div class="input-group-desc">
                                                <input class="input--style-5" type="text" name="expericencia[]">
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="input-group-desc">
                                                <button class="btn btn--radius-2 btn--blue" id="add-exp"
                                                    type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->first('expericencia.*'))
                                        <label style="color: red;"> {{ $errors->first('expericencia.*') }}</label>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/select2/select2.min.js') }}"></scr>
    <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script>
        $("#cpf").keyup(function() {
            $("#cpf").mask('000.000.000-00');
        });

        var count = 1;

        $("#add-formacao").click(function() {
            count++;
            $("#formacoes").append('<div id="formacao_' + count + '"> <div class="name">Formação ' + count +
                '  </div> <div class="value"> <div class="row row-refine"> <div class="col-10"> <div class="input-group-desc"> <input class="input--style-5" type="text" name="formacao[]"> </div> </div> <div class="col-1"> <div class="input-group-desc"> <button class="btn btn--radius-2 btn--blue remove_formacao" value="' +
                count + '" type="button">-</button> </div> </div> </div> </div></div>');
        });

        $('form').on('click', '.remove_formacao', function() {
            count--;
            $('#formacao_' + $(this).val()).remove();
        });

        var count2 = 1;

        $("#add-exp").click(function() {
            count2++;
            $("#experiencias").append('<div id="exp_' + count2 + '"> <div class="name">Experiencia ' + count2 +
                '  </div> <div class="value"> <div class="row row-refine"> <div class="col-10"> <div class="input-group-desc"> <input class="input--style-5" type="text" name="expericencia[]"> </div> </div> <div class="col-1"> <div class="input-group-desc"> <button class="btn btn--radius-2 btn--blue remove_exp" value="' +
                count2 + '" type="button">-</button> </div> </div> </div> </div></div>');
        });

        $('form').on('click', '.remove_exp', function() {
            count2--;
            $('#exp_' + $(this).val()).remove();
        });
    </script>
</body>

</html>
