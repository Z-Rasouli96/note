<template>
  <div class="main">
    <img alt="Vue logo" class="image-note" src="../assets/note.png">
    <h1>{{ msg }}</h1>
    <div class="list">
      <ul>
        <li v-for="note in notes" :key="note.id" class="note-box">
          <div v-if="note.id === NoteId" class="update-form">
            <button @click="updateNote(note.id)">Save</button>
            <button @click="cancelEdit">Cancel</button>
            <input v-model="currentNote.title" placeholder="Title" />
            <textarea v-model="currentNote.text" placeholder="Text"></textarea>
          </div>
          <div v-else @click="startEdit(note)">
            <h3>{{ note.title }}</h3>
            <p>{{ note.text }}</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'NotePage',
  data() {
    return {
      notes: [],
      NoteId: null,
      currentNote: { title: '', text: '' },
      noteList: []
    };
  },
  props: {
    msg: String
  },
  mounted() {
    this.listNote();
  },
  methods: {
    async listNote() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/note/list');
        this.notes = response.data.data;
      } catch (error) {
        console.log("list note", error);
      }
    },
    startEdit(note) {      
      this.NoteId = note.id; 
      this.currentNote = { ...note };
    },
    async updateNote(noteId) {
      try {
        await axios.put(`http://127.0.0.1:8000/api/note/${noteId}/update`, JSON.stringify(this.currentNote),{
          headers:{
            'Content-Type':'application/json'
          }
        });
        this.NoteId = null;
        this.listNote()
      } catch (error) {
        console.log("Error updating", error);
      }
    },
    cancelEdit() {
      this.NoteId = null;
    }
  }
};
</script>


<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.image-note {
  width: 120px;
}

.note-box{
  background-color: darkgrey;
  width: 200px;
  height: 200px;
  border-radius: 5px;
  box-shadow: 4px 4px;
}
.update-form{
  margin-top: 20px;
}
.update-form input{
  background-color: transparent;
  border: none;
  width: 170px;
  padding: 5px 0;
}
.update-form textarea{
  background-color: transparent;
  border: none;
  width: 170px;
  padding: 5px 0;
  resize: none;
}
</style>
