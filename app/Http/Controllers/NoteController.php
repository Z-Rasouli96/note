<?php

namespace App\Http\Controllers;
use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Repositories\Note\NoteRepository;

class NoteController extends Controller
{
    public $noteRepo;

    public function __construct(NoteRepository $noteRepository){
        $this->noteRepo = $noteRepository;
    }

    public function create(NoteRequest $request){
        $note = $this->noteRepo->createNote($request->all());
        return response()->json($note);
    }

    public function list() {
     
        $notes = $this->noteRepo->listNote();
        return response()->json($notes);
    }

    public function get(Note $note){
        return response()->json($note);
    }

    public function update(NoteRequest $request,Note $note){
        $updatenote = $this->noteRepo->updateNote($request->all(),$note);
        return response()->json($updatenote);
    }
}
