<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Info;

class InfoController extends Controller
{
    function infoData($id){
       //$infos = Info::all(); //all data
        $infos = Info::find($id); //find by id
        return $infos;
    }

    function insertData(Request $request){
       $info = new info();
       $info->name = $request->name;
       $info->email= $request->email;
       $info->api_token = md5(microtime().uniqid()); //generate token
       $info->save();
       return $info;
    }

    function deleteData($id){
        $info = Info::find($id);
        $info -> delete();
        return response()->json(['message' => 'Delete Successfully']);
    }

    function updateData(Request $request,$id){
        $info = Info::find($id);
        $info->name = $request->name;
        $info->email= $request->email;
        $info->save();
        return response()->json(['message' => 'Update Successfully']);
    }
}
