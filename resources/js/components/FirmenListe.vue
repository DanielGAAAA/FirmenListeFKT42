<template>
<div>
<h1>firmen</h1>
<div v-for="firma in firmen" v-bind:key="firma.id" >

<ul>
    <li><h3>{{firma.firmenName}}</h3>
    <div v-for="mitarbeiter in mitarbeiters" v-bind:key="mitarbeiter.id">
    <div v-if="mitarbeiter.firmen_Id==firma.firmenId">
    <p>{{"Vorname: "+mitarbeiter.vorname + " Nachname: " + mitarbeiter.nachname +" Email: " + mitarbeiter.email  }}</p>
    </div>
    </div>
      <form @submit.prevent="addMitarbeiter">
        <div><input v-model="mitarbeiter.vorname" type="text" placeholder="vorname" ></div>
        <div><input v-model="mitarbeiter.nachname" type="text" placeholder="nachname" ></div>
        <div><input v-model="mitarbeiter.email" type="text" placeholder="email" required></div>

<button type="submit">neuer mitarebeiter</button>
    </form>
    </li>
</ul></div></div>
</template>
<script>

export default{
    data(){
        return {
            mitarbeiters:[],
             mitarbeiter:{
                id:"",
                firmen_id: 2,
                vorname:"",
                nachname:"",
                email:""
            },
            firmen: [],
            firma: {
                firmenId:"",
                firmenname:"",
                mitarbeiterss:[]
            },
            edit:false,
            
             
        }
    },
 
    created(){
        this.fetchFirmen();
        
    },
    methods:{
       async  fetchFirmen(){
           await fetch("api/firmen")
            .then(res => res.json())
            .then(res=> {this.firmen=res.data})
            .then(res=>{console.log(this.firmen[0]);});


            
            await fetch("api/mitarbeiter")
            .then(res=>res.json())
            .then(res=>{this.mitarbeiters=res.data})
            .then(res=>{console.log(this.mitarbeiters);});

    },
    addMitarbeiter(){
        fetch("api/mitarbeiter",{
            method: "post",
            body:JSON.stringify(this.mitarbeiter),
            headers:{
                "content-type" : "application/json"
            }
        })
        .then(res=>res.json())
        .then(data=>{
            this.mitarbeiter.vorname="";
            this.mitarbeiter.nachname="";
            this.mitarbeiter.email="";
            alert("succsess");
            location.reload();
            })
    }
   }}




</script>