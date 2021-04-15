<?php

namespace App\Http\Controllers\Admin\Shortcut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shortcut;
class ShortcutController extends Controller
{
    public function index()
    {
    	$shortcuts = Shortcut::orderBy('sort')->get();
    	return view('admin.shortcut.index',compact('shortcuts'));
    }

    public function create()
    {
    	return view('admin.shortcut.add');
    }

    public function store(Request $request)
    {
    	$shortcut = Shortcut::create($request->only(['title','link','icon']));
    	return redirect()->route('shortcuts.edit',$shortcut)->with('status','Новый ярлык добавлен');
    }

    public function edit(Shortcut $shortcut)
    {
    	return view('admin.shortcut.add',compact('shortcut'));
    }

    public function update(Request $request, Shortcut $shortcut)
    {
    	$shortcut->update($request->only(['title','link','icon']));
    	return redirect()->route('shortcuts.edit',$shortcut)->with('status','Новый ярлык изменен');
    }

    public function destroy($id)
    {

    }
}
