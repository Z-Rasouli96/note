<template>
  <div class="main">
    <img alt="Vue logo" class="image-note" src="../assets/note.png">
    <h1>{{ msg }}</h1>
    <div class="list">
      
        <div v-for="note in notes" :key="note.id" class="note-box">
          <div v-if="note.id === NoteId" class="update-form">
            <div class="btn">
              <button class="save-btn" @click="updateNote(note.id)">Save</button>
              <button class="cancel-btn" @click="cancelEdit">Cancel</button>
            </div>
            <input v-model="currentNote.title" placeholder="Title" required/>
            <textarea v-model="currentNote.text" placeholder="Text"></textarea>
          </div>
          <div v-else @click="startEdit(note)">
            <h3>{{ note.title }}</h3>
            <p>{{ note.text }}</p>
          </div>
        </div>
     
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
      const token = localStorage.getItem('token');
      if (token) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      }
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

.list{
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  margin: 0 80px;
}

.note-box{
  background-color: rgba(223, 220, 154, 0.753);
  width: 200px;
  height: 200px;
  border-radius: 5px;
  box-shadow: 4px 4px;
  margin-left: 5px;
  overflow:auto;
  margin: 5px;
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
  height: 80px;
  padding: 5px 0;
  resize: none;
  cursor:progress;
}
.btn{
  margin: 0 5px;
  display: flex;
  justify-content: space-between;
}
.save-btn{
  background-color: #008b4d;
  border-radius: 5px;
  border: none;
  color: #fff;
  padding: 4px 8px;
}
.cancel-btn{
  background-color: #d30101;
  border-radius: 5px;
  border: none;
  color: #fff;
  padding: 4px 8px;
}
</style>
