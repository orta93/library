<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Editorial;

class EditorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $trashed = $request->boolean('trashed');

        /*$editorials = new Editorial();
        if ($trashed) {
            $editorials = $editorials->withTrashed();
        }
        $editorials = $editorials->get();*/

        if ($trashed) {
            $editorials = Editorial::withTrashed()->get();
        } else {
            $editorials = Editorial::all();
        }
        return view('editorials.index')->with(['editorials' => $editorials, 'trashed' => $trashed]);
    }

    public function show(Request $request, $id)
    {
        $editorial = Editorial::find($id);

        if ($editorial) {
            return view('editorials.show')->with([
                'editorial' => $editorial
            ]);
        }
        
        return redirect()->to('/editorials');
    }

    public function create()
    {
        return view('editorials.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $editorial = Editorial::create([
            'name' => $request->get('name'),
        ]);

        if ($editorial) {
            return redirect()->to('/editorials');
        } else {
            return redirect()->to('/editorials/create');
        }
    }

    public function edit(Request $request, $id)
    {
        $editorial = Editorial::find($id);
        //$editorial = Editorial::where('id', $id)->first();

        if ($editorial) {
            return view('editorials.edit')->with([
                'editorial' => $editorial
            ]);
        }
        
        return redirect()->to('/editorials');
    }

    public function update(Request $request, $id)
    {
        $editorial = Editorial::find($id);

        if ($editorial) {
            /**Option 1. Using functions */
            /*$editorial->name = $request->get('name');

            if ($editorial->save()) {
                return redirect()->to('/editorials');
            }*/

            /**Option 2. Using eloquent */
            $save = Editorial::where('id', '=', $id)->update([
                'name' => $request->get('name'),
            ]);

            if ($save) {
                return redirect()->to('/editorials');
            }

            //$save = Editorial::where('id', $id)->update($request->except('_token'));
        }
        
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        $editorial = Editorial::find($id);

        if ($editorial) {
            /** Option 1. Using functions */
            $editorial->delete();

            /** Option 2. Using eloquent */
//            Editorial::where('id', $id)->delete();
        }

        return redirect()->back();
    }

    public function restore(Request $request, $id)
    {
        $editorial = Editorial::withTrashed()->where('id', $id)->first();
        if ($editorial) {
            $editorial->restore();
        }

        return redirect()->back();
    }
}
