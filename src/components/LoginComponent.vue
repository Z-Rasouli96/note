<template>
  <h1>login</h1>
  <div class="main">
    <div class="form">
      <div class="form-box">
        <input v-model="email" type="email" placeholder="Enter email"/><br />
        <input v-model="password" type="text" placeholder="Enter password"/><br />
        <button @click="insertNote()">Login</button>
        <router-link class="register-link" to="/register">Are you registered?</router-link>
      </div>
    </div>
    
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: 'loginApp',
  data(){
    return {
      email:"",
      password:""
    }
  },

  mounted() {
   
  },
  methods: {
    async insertNote(){
      let data = JSON.stringify({
        email: this.email,
        password:this.password
    });

    console.log(data);
    
      
      try {
        await axios.post('http://127.0.0.1:8000/api/login',data,{
          headers:{"Content-Type" : "application/json"}
        })
       .then((result) => {
        console.log(result.data);
        localStorage.setItem('token',result.data.token);
        localStorage.setItem('email',result.data.email);
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
.form-box .register-link{
  display: flex;
  justify-content: start;
  padding: 10px 5px;
  color: #fff;
  text-decoration: none;
  font-size: 14px;
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
