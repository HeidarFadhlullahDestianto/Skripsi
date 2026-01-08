<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Day;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index($day_id)
    {
        $day = Day::findOrFail($day_id);
        $exercises = $day->exercises;

        return view('admin.exercise.index', compact('day', 'exercises'));
    }

    public function create($day_id)
    {
        $day = Day::findOrFail($day_id);
        return view('admin.exercise.create', compact('day'));
    }

    public function store(Request $request, $day_id)
    {
        $request->validate([
            'title' => 'required',
            'sets' => 'required',
            'reps' => 'required',
            'image' => 'image|max:2048'
        ]);
    
        $imageName = null;
    
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/exercise'), $imageName);
        }
    
        Exercise::create([
            'day_id' => $day_id,
            'title' => $request->title,
            'sets' => $request->sets,
            'reps' => $request->reps,
            'image' => $imageName
        ]);
    
        return redirect()->route('admin.exercise.index', $day_id)
            ->with('success', 'Latihan berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        return view('admin.exercise.edit', compact('exercise'));
    }

    public function update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail($id);

        $request->validate([
            'exercise_name' => 'required',
            'sets' => 'required|numeric',
            'reps' => 'required|numeric',
            'image' => 'image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/exercise'), $imageName);
            $exercise->image = $imageName;
        }

        $exercise->exercise_name = $request->exercise_name;
        $exercise->sets = $request->sets;
        $exercise->reps = $request->reps;
        $exercise->save();

        return back()->with('success', 'Exercise diperbarui!');
    }

    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        $day_id = $exercise->day_id;

        if ($exercise->image && file_exists(public_path('uploads/exercise/'.$exercise->image))) {
            unlink(public_path('uploads/exercise/'.$exercise->image));
        }

        $exercise->delete();

        return redirect()->route('admin.exercise.index', $day_id)
            ->with('success', 'Latihan dihapus!');
    }
}
