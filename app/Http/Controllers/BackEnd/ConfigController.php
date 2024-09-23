<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index() {
        return view('backend.config.index', [
            'configs' => Config::paginate(5)
        ]);
    }

    public function update(Request $request, string $id) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'value' => 'required|min:3'
        ]);

        Config::find($id)->update($data);

        return back()->with('success', 'Configurations Has Been Updated...');
    }
}
