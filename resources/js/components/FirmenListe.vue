<style >
    form { 
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
     
    }
    </style>
    
    
    <template>
        
        
    <div>
        <router-link to="/firma">register</router-link> 
        <router-link to="/login">login</router-link> 
    <h1>Firmen</h1>
    <p> 
     
     <form id="id1" class="form" @submit.prevent="addMitarbeiter" >
            <p><label>Wähle Firma:</label></p>
    <select v-model="mitarbeiter.firmen_id" id="cars" name="cars" size="6" required>
      <option  v-for="(firma , index) in firmen" v-bind:key="firma.firmenId">{{firma.firmenName}}</option>
    </select>
            <p><label>Vorname <input v-model="mitarbeiter.vorname"  type="text" placeholder="vorname" name="vorname" required></label></p>
            <p><label>Nachname <input v-model="mitarbeiter.nachname"  type="text" placeholder="nachname" name="nachname" required></label></p>
            <div class="mb-3">
                <p> <label for="exampleInputEmail1" class="form-label">Email     <input v-model="mitarbeiter.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required></label></p>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
           <button type="submit" class="btn btn-primary">Neuer mitarebeiter</button>
    </form></p>
    <div v-for="firma in firmen" v-bind:key="firma.id" >
    
    <ul>
        <li><h3>{{firma.firmenName}}</h3>
        <p style="font-size: large; font-weight: bold;">Mitarbeiter:</p>
        <div v-for="mitarbeiter in mitarbeiters" v-bind:key="mitarbeiter.id">
        <div v-if="mitarbeiter.firmen_Id==firma.firmenId">
        <p>{{"Vorname: "+mitarbeiter.vorname + "  Nachname: " + mitarbeiter.nachname +" Email: " + mitarbeiter.email  }}</p>
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
    