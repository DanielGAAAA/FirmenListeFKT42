<template>
<div>
<h1>Firmen</h1>
<p> 

 
 <form id="id1" @submit.prevent="addMitarbeiter" >
        <p><label>Wähle Firma:</label></p>
<select v-model="mitarbeiter.firmen_id" id="cars" name="cars" size="6" >
  <option  v-for="(firma , index) in firmen" v-bind:key="firma.firmenId">{{firma.firmenName}}</option>
</select>
        <p><label>Vorname<input v-model="mitarbeiter.vorname"  type="text" placeholder="vorname" name="vorname"></label></p>
        <p><label>Nachname<input v-model="mitarbeiter.nachname"  type="text" placeholder="nachname" name="nachname"></label></p>
       <p> <label>Email     <input v-model="mitarbeiter.email" type="email" placeholder="email" required></label></p>
<button type="submit">Neuer mitarebeiter</button>
</form></p>
<div v-for="firma in firmen" v-bind:key="firma.id" >

<ul>
    <li><h3>{{firma.firmenName}}</h3>
    <p style="font-size: large; font-weight: bold;">Mitarbeiter:</p>
    <div v-for="mitarbeiter in mitarbeiters" v-bind:key="mitarbeiter.id">
    <div v-if="mitarbeiter.firmen_Id==firma.firmenId">
    <p>{{"Vorname: "+mitarbeiter.vorname + " Nachname: " + mitarbeiter.nachname +" Email: " + mitarbeiter.email  }}</p>
    </div>
    </div>
  

    
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
                firmen_id: "",
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
            .then(res=> {this.firmen=res.data});
            this.firmen=this.firmen;
            
            await fetch("api/mitarbeiter")
            .then(res=>res.json())
            .then(res=>{this.mitarbeiters=res.data})
            .then(res=>{console.log(this.mitarbeiters);});


    },

    addMitarbeiter(){
        for(let i=0; i<this.firmen.length;i++){

    
            if(this.mitarbeiter.firmen_id==this.firmen[i].firmenName){
                console.log("tst")
                this.mitarbeiter.firmen_id=this.firmen[i].firmenId;
            }
        }
    
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