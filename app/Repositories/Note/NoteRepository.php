<?php

namespace App\Repositories\Note;

use App\Models\Note;
use App\Http\Resources\NoteResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DataCollection;

class NoteRepository
{
    public function createNote($data)
    {
        $note = Note::create([
            'title' => $data['title'],
            'text' => $data['text'],
            'user_id' => Auth::user()->id,
        ]);
        
        return new NoteResource($note);
    }

    public function listNote()
    {
        $notes= Note::get();
        return new DataCollection($notes);
    }

    public function updateNote($data,$note)
    {
        $note->update([
            'title' => $data["title"] ?? $note->title,
            'text' => $data["text"] ?? $note->text
        ]);
        return $note;
    }
}