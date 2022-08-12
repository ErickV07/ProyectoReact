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

        //  $usuarios = User::where('id', $user->id)->orderBy($sortBy, $sortType);

        $usuarios = User::orderBy($sortBy, $sortType);

        if ($request['query'] != '') {
            $usuarios->where('nombre', 'like', '%' . $request['query'] . '%');
        }

        return response()->json([
            'message' => $usuarios->paginate($perPage),
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
            'password' => '',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error',
            ], 401);
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
        $user = User::where('api_token', $request['api_token'])->first();


        $post = $this->users->findOrFail($request['id']);

        if (empty($post)) {
            return response()->json([
                'message' => 'Lead Not Found',
                'status' => 'error',
            ]);
        }

        $validate = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'tipo_usuario' => 'required|string',
            'imagen' => 'string',
            'email' => 'required|email|unique:usuarios,email,' . $post->id . ',id',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'message' => $validate->errors(),
                'status' => 'validation-error',
            ], 401);
        }

        $actualizarUsuario = $post->update([
            'nombre' => $request['nombre'],
            'tipo_usuario' => $request['tipo_usuario'],
            'imagen' => $request['imagen'],
            'email' => $request['email'],
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Usuario Actualizado!',
            'status' => 'success',
        ]);
    }

    public function destroy(Request $request)
    {
        $users = User::where('api_token', $request['api_token'])->first();

        $post = User::find($request['id']);

        if (empty($post)) {
            return response()->json([
                'message' => 'Error al eliminar el usuario',
                'status' => 'error',
            ]);
        }

        $eliminarUsuario = $post->delete();

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
