<?php

namespace App\Http\Controllers\API\AdminAPI;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class UsersController extends Controller
{
    protected $users = '';

    public function __construct(User $users)
    {
        $this->middleware('auth:api');
        $this->users = $users;
    }

    public function listData(Request $request)
    {
        $user = User::where('api_token', $request['api_token'])->first();

        $perPage = $request['per_page'];
        $sortBy = $request['sort_by'];
        $sortType = $request['sort_type'];


        $users = User::orderBy($sortBy, $sortType);

        if ($request['query'] != '') {
            $users->where('nombre', 'like', '%' . $request['query'] . '%');
        }

        return response()->json([
            'message' => $users->paginate($perPage),
            'status' => 'success',
        ]);
    }

    public function create(Request $request)
    {
        $user = User::where('api_token', $request['api_token'])->first();

        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'tipo_usuario' => 'required|string',
            'imagen' => 'string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error',
            ], 401);
        }

        
        if ($request['imagen']) {
            $name = time() . '.' . explode('/', explode(':', substr($request['imagen'], 0, strpos ($request['imagen'], ';')))[1])[1];
            (!file_exists(public_path().'/assets/img/profiles/')) ? mkdir(public_path().'/assets/img/profiles/',0777,true) : null;

            \Image::make($request['imagen'])->save(public_path('assets/img/profiles/') . $name);
            $request->merge(['imagen' => $name]);

        }

        $usuarioNuevo = User::create([
            'nombre' => $request['nombre'],
            'tipo_usuario' => $request['tipo_usuario'],
            'imagen' => $request['imagen'],
            'email' => $request['email'],
            'password' => bcrypt($request->password),
            'api_token' => Str::random(80),
        ]);
        $usuarioNuevo->save();

        $token = Str::random(80);

        $usuarioNuevo->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        if ($usuarioNuevo) {
            return response()->json([
                'message' => 'Usuario Creado!',
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => 'Ocurrio un problema!',
                'status' => 'error',
            ]);
        }
    }

    public function update(Request $request)
    {
        $user = User::where('api_token',$request['api_token'])->first();

        $users = User::where('id',$request['id'])->first();

        if (empty($users)) {
            return response()->json([
                'message' => 'Error al actualizar el usuario',
                'status' => 'error'
            ]);
        }


        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'tipo_usuario' => 'required|string',
            'imagen' => 'string',
            'email' => 'required|email|unique:users,email,' . $users->id . ',id',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error',
            ], 401);
        }


        $currentImagen = $users->imagen;

        if ($request->imagen != $currentImagen) {
            $name = time().'.' . explode('/', explode(':', substr($request->imagen, 0, strpos($request->imagen, ';')))[1])[1];

            \Image::make($request->imagen)->save(public_path('/assets/img/profiles/').$name);
            $request->merge(['imagen' => $name]);

            $userPhoto = public_path('/assets/img/profiles/') . $currentImagen;
            if (file_exists($userPhoto)) {
                @unlink($userPhoto);
            }

        }
        if (!empty($request->password)) {
            $request->merge(['password' => bcrypt($request['password'])]);
        }

        $actualizarUsuario = $users->update([
            'nombre' => $request['nombre'],
            'tipo_usuario' => $request['tipo_usuario'],
            'imagen' => $request['imagen'],
            'email' => $request['email'],
            'password' => bcrypt($request->password),
            'api_token' => $request['api_token'],
        ]);

        return response()->json([
            'message' => 'Usuario Actualizado!',
            'status' => 'success',
        ]);
    }

    public function destroy(Request $request)
    {
        $users = User::where('api_token', $request['api_token'])->first();

        $post = User::FindOrFail($request['id']);

        if (empty($post)) {
            return response()->json([
                'message' => 'Error al eliminar el usuario',
                'status' => 'error',
            ]);
        }

        if(file_exists('/assets/img/profiles/'.$post->imagen) AND !empty($post->imagen)){
            unlink('/assets/img/profiles/'.$post->imagen);
         }
         try{

            $eliminarUsuario = $post->delete();
            $bug = 0;
        }
        catch(\Exception $e){
            $bug = $e->errorInfo[1];
        }

        

        if ($eliminarUsuario) {
            return response()->json([
                'message' => 'Usuario eliminado',
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => 'Ocurrio un problema!',
                'status' => 'error',
            ]);
        }
    }
}
