<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cursos;
use App\Models\Proexps;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        $user = User::where('id', auth()->user()->id)->with(['Cursos', 'Proexps'])->first();
        return view('dashboard.dashboard', compact('user'));
    }

    public function update(Request $request){
        $request->validate([
            'nome' => ['required', 'min:6', 'max:255', "regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/"],
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'cpf' => 'required|cpf|unique:users,cpf,'.auth()->user()->id,
            'genero' => 'required|in:Feminino,Masculino,Outros',
            'nascimento' => 'required|date',
            'estado_civil' => 'required|in:Solteiro(a),Casado(a),Divorciado(a),Viuvo(a)|string',
            'ensino' => 'required|in:Fundamental-Incompleto,Fundamental-Completo,Médio-Incompleto,Médio-Completo,Superior-Incompleto,Superior-Completo',
            'formacao' => 'required|array',
            'formacao.*' => 'required|string',
            'expericencia' => 'required|array',
            'expericencia.*' => 'required|string',
        ], [
            'nome.required' => 'Informe o nome completo.',
            'nome.min' => 'Minimo de 6 caracteres para nome.',
            'nome.max' => 'Maximo de 255 caracteres para o nome.',
            'nome.regex' => 'O nome informado é invalido.',

            'email.required' => 'Informe um endereço de email.',
            'email.email' => 'O email informado é invalido.',
            'email.unique' => 'O email informado já está em uso.',

            'cpf.required' => 'Informe a senha.',
            'cpf.cpf' => 'O cpf informado é invalido.',
            'cpf.unique' => 'O cpf informado já está cadastrado.',

            'genero.required' => 'Informe um genero.',
            'genero.in' => 'Genero informado inválido.',

            'nascimento.required' => 'Informe um nascimento.',
            'nascimento.date' => 'O nascimento informado é invalido.',

            'estado_civil.required' => 'Informe um Estado civil.',
            'estado_civil.in' => 'O estado civil informado é invalido.',

            'ensino.required' => 'Informe o ensino.',
            'ensino.in' => 'O ensino informado é invalido.',

            'formacao.required' => 'Informe uma formação.',
            'formacao.array' => 'A formação informada é invalida.',

            'formacao.*.required' => 'Informe uma formação.',
            'formacao.*.string' => 'A formação informada é invalida.',

            'expericencia.required' => 'Informe uma expericencia.',
            'expericencia.array' => 'A formação expericencia é invalida.',
            
            'expericencia.*.required' => 'Informe uma expericencia.',
            'expericencia.*.string' => 'A formação expericencia é invalida.',
        ]);

        Cursos::where('user_id', auth()->user()->id)->delete();
        Proexps::where('user_id', auth()->user()->id)->delete();

        foreach ($request->formacao as $form) {
            if ($form !== null) {
                $linha = [
                    'user_id' => auth()->user()->id,
                    'curso' => $form ?? 'não preenchido',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
                $linhas[] = $linha;
            }
        }


        Cursos::insert($linhas);

        foreach ($request->expericencia as $exp) {
            if ($exp !== null) {
                $linha2 = [
                    'user_id' => auth()->user()->id,
                    'exp' => $exp,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
                $linhas2[] = $linha2;
            }
        }

        Proexps::insert($linhas2);

        User::where('id', auth()->user()->id)->update([
            'name' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'genero' => $request->genero,
            'nascimento' => $request->nascimento,
            'estado_civil' => $request->estado_civil,
            'ensino' => $request->ensino
        ]);
        return back()->with('success','Cv updated successfully!');
    }
}
