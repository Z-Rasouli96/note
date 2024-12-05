<template>
  <h1>create note</h1>
  <div class="main">
    <div class="form">
      <div class="form-box">
        <input v-model="title" type="text" placeholder="Enter title" :required="test"/><br />
        <input v-model="text" type="text" placeholder="Enter text" :required="test"/><br />
        <button @click="insertNote()">Add Item</button>
      </div>
      </div>
    
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
   this.auth();
  },
  methods: {
    auth(){
      const token = localStorage.getItem('token');
      if (token) {
        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      }
    },
    async insertNote(){
      let data = JSON.stringify({
        title: this.title,
        text:this.text,
        user_id:5
    });

      try {
        await axios.post('http://127.0.0.1:8000/api/note/insert',data,{
          headers:{"Content-Type" : "application/json"}
        })
       .then((result) => {
        console.log(result);
        
        this.$swal({
          icon: 'success',
          title: 'Note',
          text: 'Your Note created successfully.',
        });
        
        this.$router.push({name:'NotePage'})
        
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
.main{
  display: flex;
  justify-content: center;

}
.form {
  border-radius: 5px;
  background-color: #008597be;
  width: 230px;
}
.form-box{
  margin: 10px 0;
}
.form-box input{
  margin: 5px;
  border-radius: 5px;
  border: none;
  width: 170px;
  padding: 5px 2px;
}
button{
  width: 180px;
  border-radius: 5px;
  background-color: rgb(109, 148, 170);
  color: #fff;
  border: none;
  padding: 5px 0;
}
</style>
