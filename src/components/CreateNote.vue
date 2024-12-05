<template>
  <div class="main">
    <h1>create note</h1>

    <input v-model="title" type="text" placeholder="Enter title"/><br />
    <input v-model="text" type="text" placeholder="Enter text"/><br />
    <button @click="insertNote()">Add Item</button>
    
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: 'CreateNote',
  data(){
    return {
      title:"",
      text:""
    }
  },

  mounted() {
   
  },
  methods: {
    async insertNote(){
      // const note = { title: "Vue POST Request Example"};
     
      let data = JSON.stringify({
        title: this.title,
        text:this.text,
        user_id:5
    });

    console.log(data);
    
      
      try {
        // await axios.post('http://127.0.0.1:8000/api/note/insert'note, { headers: {'Content-Type': 'application/json'}})
        await axios.post('http://127.0.0.1:8000/api/note/insert',data,{
          headers:{"Content-Type" : "application/json"}
        })
       .then((result) => {
        console.log(result);
        
        })
      } catch (error) {
        console.log("list note",error);
        
      }
    }
  }
  }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
</style>
