<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use DB;

use Auth;

use App\Notifications\SuccessNewUser;
use App\Notifications\SuccessEditUser;
use App\Notifications\SuccessDeleteUser;
use App\Notifications\SuccessActivateUser;

use App\Http\Requests\AddUserRequest;

use App\Http\Requests\EditUserRequest;

use App\Http\Middleware\AdminUsers;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('adminUsers');
        $this->middleware('sentryContext');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->get()->except(Auth::id());
        return view('users.users_index', compact('users'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $role_id = DB::table('roles')->pluck('name', 'id');
            return view('users.add_user')->with('role_id', $role_id)->render();
        } catch (Exception $e ) {
            //hacer algo
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        try {
        $psswrd = $this->makePassword();
            User::create([
            'name'=> ($request['name']),     
            'firstName'=>($request['firstName']),
            'lastName'=>($request['lastName']),
            'birthday'=>($request['birthday']),
            'username'=>($request['username']),
            'email'=>($request['email']),
            'phone'=>($request['phone']),
            'password'=>bcrypt($psswrd),
            'role_id'=>($request['role_id']),
              ]);
            $newUser = User::where('username', $request['username'])->first();
            $newUser->notify(new SuccessNewUser($psswrd));
            return response()->json(["mensaje" => "Usuario Creado Correctamente."]);
        } catch (Exception  $e) {
            return response()->json(["error" => "No se ha podido guardar el usuario."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id', $id)->first();
        $role_id = DB::table('roles')->pluck('name', 'id');
        return view('users.edit_user',['user'=>$user])->with('role_id', $role_id)->render();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request)
    {
        try {
            $id = $request['id'];
            $user =User::find($id);
            $user->name=$request['name'];
            $user->firstName=$request['firstName'];
            $user->lastName=$request['lastName'];
            $user->username=$request['username'];
            $user->email=$request['email'];
            $user->role_id=$request['role_id'];
            $user->birthday=$request['birthday'];
            $user->phone=$request['phone'];
            $user->save();
            $user->notify(new SuccessEditUser());
            return response()->json(["mensaje" => "Usuario Actualizado Correctamente"]); 
        }catch (Exception $e){
            return response()->json([
                "error" => "No existe la página solicitada"
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
        $user = User::find($id);
        $user->delete();
        $user->notify(new SuccessDeleteUser());
        return response()->json(["mensaje"=>"Usuario borrado Correctamente"]);
        } catch (Exception $e) {
            return response()->json(["error"=>"Ha ocurrido un error al intentar eliminar al usuario."]);
        }
    }
    
    private function makePassword()
    {
        //Se define una cadena de caractares.
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        //Obtenemos la longitud de la cadena de caracteres
        $longitudCadena = strlen($cadena);
        //Se define la variable que va a contener la contraseña
        $pass = "";
        //Se define la longitud de la contraseña
        $longitudPass = 6;
        //Creamos la contraseña
        for($i=1 ; $i <= $longitudPass; $i++){
            //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
            $pos = rand(0,$longitudCadena-1);
            //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
            $pass .= substr($cadena,$pos,1);
        }
        return $pass;
    }
    
    public function activate($id) {
        User::onlyTrashed()
                ->where('id', $id)
                ->restore();
        $user = User::where('id', $id)->first();
        $psswrd = $this->makePassword();
        $user->password = bcrypt($psswrd);
        $user->save();
        $user->notify(new SuccessActivateUser($psswrd));
        return response()->json(["mensaje"=>"Usuario activado Correctamente"]);
    }
    
}
