<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbRecipienst;

class RecipientController extends Controller
{
    function Add(Request $request)
    {
        if ($request->input('add')) {

            $request->validate([
                'name' => 'required',
                'idproof' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                'designation' => 'required',

            ]);
            $sender = new DbRecipienst;
            $sender->name = $request->input('name');
            $sender->idproof = $request->input('idproof');
            $sender->designation = $request->input('designation');
            $sender->status = 'active';
            $sender->save();
        }
        return view('Recipienst.Add');
    }
    function List(Request $request)
    {
        $recipienst = DbRecipienst::all();
        return view('Recipienst.List', compact('recipienst'));
    }
    function Edit(Request $request, $id)
    {
        $sender = DbRecipienst::find($id);
        if ($request->input('update')) {
            $request->validate([
                'name' => 'required',
                'idproof' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                'designation' => 'required',

            ]);

            $sender->name = $request->input('name');
            $sender->idproof = $request->input('idproof');
            $sender->designation = $request->input('designation');
            $sender->status = 'active';
            $sender->save();
            return \redirect()->route('listrecipienst');
        }
        $recipienst = DbRecipienst::find($id);
        return view('Recipienst.Add', compact('recipienst'));
    }
    function Delete(Request $request, $id)
    {
        $senders = DbRecipienst::find($id);
        $senders->delete();
        return \redirect()->route('listrecipienst');
    }
}
