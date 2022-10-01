<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Models\ModelPermission;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$users=User::all();
        //
       // $users=User::with('permission')->get();
       // $users=User::with('permissions')->find(4);
        return view('user',['users'=>$users]);*/
        $users=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('users','model_id','=','users.id')
        ->select('users.*', 'permissions.name as permicao')
        ->get();
        //return $exp;
       
        return view('admin.usuario',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exp=DB::table('model_has_permissions')
        ->join('permissions','permission_id','=','permissions.id')
        ->join('user','model_id','=','users.id')
        ->select('users.*', 'permissions.*')
        ->get();
        return $exp;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function bloquear(Request $request)
    {
       // dd($request->usuario_id);
        $user = User::findOrFail($request->usuario_id);
        
        $user->estado = 'inativo';
        $user->update();

        return redirect()->back()->with('sms', 'Usuário Bloqueado');
              
    }

    public function desbloquear(Request $request)
    {
        $user = User::findOrFail($request->usuario_id);
        $user->estado = 'ativo';
        $user->update();
        return redirect()->back()->with('sms', 'Usuário Desbloqueado');
              
    }

    public function destroy($id)
    {
        //
    }
}
