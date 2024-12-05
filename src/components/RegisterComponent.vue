<template>
  <h1>Register</h1>
  <div class="main">
    <div class="form">
      <div class="form-box">
        <input v-model="name" type="text" placeholder="Enter name"/><br />
        <input v-model="email" type="email" placeholder="Enter email"/><br />
        <input v-model="password" type="text" placeholder="Enter password"/><br />
        <input v-model="cPassword" type="text" placeholder="Enter c-password"/><br />
        <button @click="insertNote()">register</button>
      </div>
    </div>
    
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: 'registerApp',
  data(){
    return {
      name:"",
      email:"",
      password:"",
      cPassword:""
    }
  },

  mounted() {
   
  },
  methods: {
    async insertNote(){
      // const note = { title: "Vue POST Request Example"};
     
      let data = JSON.stringify({
        name: this.name,
        email:this.email,
        password:this.password
    });

    console.log(data);
    
      
      try {
        await axios.post('http://127.0.0.1:8000/api/register',data,{
          headers:{"Content-Type" : "application/json"}
        })
       .then((result) => {
        console.log(result);
        this.$router.push({name:'loginApp'})
        
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
  background-color: rgb(61, 61, 228);
  color: #fff;
  border: none;
  padding: 5px 0;
}
</style>
