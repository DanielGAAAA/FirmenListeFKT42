<template>
<h1> skrr{{admins[5]}}</h1>
</template>
<script>
import axios from 'axios';

export default{
data(){
  return  {
    admins:[],
    admin:{
        vorname:"",
        nachname:"",
        email:"",
        password:"",
            }
            }    
},
 created(){
 axios.get("/api/admin")
.then((response =>{
    this.admins = response.data.data;
    console.log(this.admins);
}))

}
}

</script>
<style></style>
