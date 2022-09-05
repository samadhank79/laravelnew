<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbNatureInfo;

class NaturInfoController extends Controller
{
    function Add(Request $request)
    {
        if ($request->input('add')) {

            $request->validate([
                'natureinfo' => 'required',
            ]);
            $natureinfo = new DbNatureInfo;
            $natureinfo->natureinfo = $request->input('natureinfo');
            $natureinfo->status = 'active';
            $natureinfo->save();
        }
        return view('natureinfo.Add');
    }
    function List(Request $request)
    {
        $natureinfo = DbNatureInfo::all();
        return view('Natureinfo.List', compact('natureinfo'));
    }
    function Edit(Request $request, $id)
    {
        $natureinfo = DbNatureInfo::find($id);
        if ($request->input('update')) {
            $request->validate([
                'natureinfo' => 'required',
                
            ]);

             $natureinfo->natureinfo = $request->input('natureinfo');

            $natureinfo->status = 'active';
            $natureinfo->save();
            return \redirect()->route('listnatureinfo');
        }
        $natureinfo = DbNatureInfo::find($id);
        return view('Natureinfo.Add', compact('natureinfo'));
    }
    function Delete(Request $request, $id)
    {
        $natureinfo = DbNatureInfo::find($id);
        $natureinfo->delete();
        return \redirect()->route('listnatureinfo');
    }
}
