@extends('components.layout')


@section('static-menus')
    <x-header />
    <x-leftbar />
@endsection


@section('page')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">Dashboard</span>
            </a>

        </div>


    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard.logout') }}">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log-out</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <center>
                <h1>Painel do Usuario</h1>
            </center>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">EDITAR CURRICULO</h5>
                    <form method="POST" action="{{ route('update.cv') }}" class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Nome</label>
                            <input type="text" name="nome" value="{{ $user->name }}" class="form-control">
                            @if ($errors->has('name'))
                                <label style="color"> {{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            @if ($errors->has('email'))
                                <label style="color"> {{ $errors->first('email') }}</label>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">NASCSIMENTO</label>
                            <input type="date" name="nascimento" value="{{ $user->nascimento }}" class="form-control">
                            @if ($errors->has('nascimento'))
                                <label style="color"> {{ $errors->first('nascimento') }}</label>
                            @endif
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">GENERO</label>
                            <select name="genero" class="form-select">
                                <option selected="">Informe</option>
                                <option value="Feminino" {{ $user->genero == 'Feminino' ? 'selected' : '' }}>Feminino
                                </option>
                                <option value="Masculino" {{ $user->genero == 'Masculino' ? 'selected' : '' }}>Masculino
                                </option>
                                <option value="Outros" {{ $user->genero == 'Outros' ? 'selected' : '' }}>Outros</option>
                            </select>
                            @if ($errors->has('genero'))
                                <label style="color"> {{ $errors->first('genero') }}</label>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">CPF</label>
                            <input type="text" name="cpf" value="{{ $user->cpf }}" class="form-control">
                            @if ($errors->has('cpf'))
                                <label style="color"> {{ $errors->first('cpf') }}</label>
                            @endif
                        </div>


                        <div class="col-sm-3">
                            <label class="form-label">ESCOLARIDADE</label>
                            <select name="ensino" class="form-select">
                                <option disabled="disabled" selected="selected">Informe sua Escolaridade</option>
                                <option value="Fundamental-Incompleto"
                                    {{ $user->ensino == 'Fundamental-Incompleto' ? 'selected' : '' }}>
                                    Fundamental-Incompleto</option>
                                <option value="Fundamental-Completo"
                                    {{ $user->ensino == 'Fundamental-Completo' ? 'selected' : '' }}>Fundamental-Completo
                                </option>
                                <option value="Médio-Incompleto"
                                    {{ $user->ensino == 'Médio-Incompleto' ? 'selected' : '' }}>Médio-Incompleto</option>
                                <option value="Médio-Completo" {{ $user->ensino == 'Médio-Completo' ? 'selected' : '' }}>
                                    Médio-Completo</option>
                                <option value="Superior-Incompleto"
                                    {{ $user->ensino == 'Superior-Incompleto' ? 'selected' : '' }}>Superior-Incompleto
                                </option>
                                <option value="Superior-Completo"
                                    {{ $user->ensino == 'Superior-Completo' ? 'selected' : '' }}>Superior-Completo</option>
                            </select>
                            @if ($errors->has('estado_civil'))
                                <label style="color"> {{ $errors->first('estado_civil') }}</label>
                            @endif
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">ESTADO CIVIL</label>
                            <select name="estado_civil" class="form-select">
                                <option selected="">Informe</option>
                                <option value="Solteiro(a)" {{ $user->estado_civil == 'Solteiro(a)' ? 'selected' : '' }}>
                                    Solteiro(a)</option>
                                <option value="Casado(a)" {{ $user->estado_civil == 'Casado(a)' ? 'selected' : '' }}>
                                    Casado(a)</option>
                                <option value="Divorciado(a)"
                                    {{ $user->estado_civil == 'Divorciado(a)' ? 'selected' : '' }}>Divorciado(a)</option>
                                <option value="Viuvo(a)" {{ $user->estado_civil == 'Viuvo(a)' ? 'selected' : '' }}>Viuvo(a)
                                </option>
                            </select>
                            @if ($errors->has('estado_civil'))
                                <label style="color"> {{ $errors->first('estado_civil') }}</label>
                            @endif
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6" id="formacoes">
                                @foreach ($user->Cursos as $curso)
                                    <div class="col-md-10">
                                        <label class="form-label">CURSO</label>
                                        <input type="text" name="formacao[]" value="{{ $curso->curso }}"
                                            class="form-control">
                                        @if ($errors->first('formacao.*'))
                                            <label style="color"> {{ $errors->first('formacao.*') }}</label>
                                        @endif
                                    </div>
                                @endforeach
                                <br>
                            </div>
                            <div class="col-lg-6">
                                @foreach ($user->Proexps as $exp)
                                    <div class="col-md-10">
                                        <label class="form-label">EXPERIENCIAS</label>
                                        <input type="text" name="expericencia[]" value="{{ $exp->exp }}"
                                            class="form-control">
                                        @if ($errors->first('expericencia.*'))
                                            <label style="color"> {{ $errors->first('expericencia.*') }}</label>
                                        @endif
                                    </div>
                                @endforeach
                                <br>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">ATUALIZAR</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>
        </div><!-- End Page Title -->



    </main><!-- End #main -->

    <script>
        var count = 1;

        $("#add-formacao").click(function() {
            count++;
            $("#formacoes").append('<div class="col-md-10"> <label class="form-label">CURSO</label> <input type="text" name="formacao[]" class="form-control"><button style="display:inline-block;" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></div>');
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
@endsection

@section('footer')
    <x-footer />

    @if ($message = Session::get('success'))
        <script>
            Swal.fire(
                'Sucesso!',
                'Curriculo atualizado com sucesso!',
                'success'
            );
        </script>
    @endif
@endsection
