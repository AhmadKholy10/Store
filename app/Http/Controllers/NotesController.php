<?php
  
namespace App\Http\Controllers;
  
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
  
class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        
        return response()->json($notes);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'content' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $note = Note::create($request->all());
        return response()->json([
            'data' => $note,
            'message' => 'Note created successfully'
        ], 200);
    }
  
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $note = Note::find($id);
        if(!$note){
            return response()->json([
                'message' => 'Note is not found'
            ], 400);
        }
        return response()->json($note, 200);
    }
  
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'content' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $note = Note::find($id);
        if(!$note){
            return response()->json([
                'message' => 'Note is not found'
            ], 400);
        }
        $note->update($request->all());

        if($note){
            return response()->json([
                'data' => $note,
                'message' => 'Note Updated'
            ], 200);
        }
        return response()->json('Note not saved', 400);
    }
  
   
    public function destroy($id)
    {
        $note = Note::find($id);
        if(!$note){
            return response()->json([
                'message' => 'Note is not found'
            ], 400);
        }
        $note->delete($id);
        return response()->json([
            'message' => 'Note deleted successfully'
        ]);
    }
}

