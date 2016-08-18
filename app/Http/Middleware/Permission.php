<?php

namespace App\Http\Middleware;

use Closure,Session,DB;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=Session::get('id');
        if($id!=1){
                $data=DB::table('owner_role')
                              ->join('role','role.role_id','=','owner_role.role_id')
                              ->join('role_privilege','role.role_id','=','role_privilege.role_id')
                              ->join('privilege','privilege.pri_id','=','role_privilege.pri_id')
                              ->where('owner_role.id',$id)
                              ->where('privilege.pri_fid',0)
                              ->get();
                             // print_r($data);die;
                 foreach($data as $k=>$v){
                         $arr=DB::table('role_privilege')
                         ->join('privilege','role_privilege.pri_id','=','privilege.pri_id')
                         ->where("pri_fid",$v["pri_id"])
                         ->where('role_id',$v['role_id'])
                         ->get();
                         $data[$k]['son']=$arr;
                 }
       }else{
                $data = DB::table('privilege')->where('pri_fid',0)->get();
                foreach($data as $k=>$v){
                    $arr=DB::table('privilege')->where("pri_fid",$v["pri_id"])->get();
                    $data[$k]['son']=$arr;
                }
       }
       // print_r($data);die;
        view()->share('main',$data);
        return $next($request);
    }
}
