<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbSender;

class SenderController extends Controller
{
    function Add(Request $request)
    {
        if ($request->input('add')) {

            $request->validate([
                'name' => 'required',
                'idproof' => 'required|regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/',
                'designation' => 'required',

            ]);
            $sender = new DbSender;
            $sender->name = $request->input('name');
            $sender->idproof = $request->input('idproof');
            $sender->designation = $request->input('designation');
            $sender->status = 'active';
            $sender->save();
        }
        return view('Senders.Add');
    }
    function List(Request $request)
    {
        $senders = DbSender::all();
        return view('Senders.List', compact('senders'));
    }
    function Edit(Request $request, $id)
    {
        $sender = DbSender::find($id);
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
            return \redirect()->route('listsender');
        }
        $sender = DbSender::find($id);
        return view('Senders.Add', compact('sender'));
    }
    function Delete(Request $request, $id)
    {
        $senders = DbSender::find($id);
        $senders->delete();
        return \redirect()->route('listsender');
    }
}
