<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('admin.program.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|max:2048'
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/program'), $imageName);
        }

        Program::create([
            'title' => $request->title,
            'image' => $imageName
        ]);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.program.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/program'), $imageName);
            $program->image = $imageName;
        }

        $program->title = $request->title;
        $program->save();

        return redirect()->route('admin.program.index')->with('success', 'Program diperbarui!');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->image && file_exists(public_path('uploads/program/' . $program->image))) {
            unlink(public_path('uploads/program/' . $program->image));
        }

        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program dihapus!');
    }
}
