
<template>
    
    <h1>test</h1>
    <div id="form">
    <form @submit.prevent="pushAdmin">
    <p><label>Vorname <input v-model="admin.vorname"  type="text" placeholder="vorname" name="vorname" required></label></p>
    <p><label>Nachname <input v-model="admin.nachname"  type="text" placeholder="nachname" name="nachname" required></label></p>
    <p> <label>Email     <input v-model="admin.email" type="email" placeholder="email" required></label></p>
    <p><label>Password<input v-model=" admin.password" type="password"></label></p>
<button type="submit">register</button>

</form>
</div>
    </template>

<script>

export default{
    data() {
        return {
            admins: [],
            admin: {
                vorname: "",
                nachname: "",
                email: "",
                password: ""
            },
        };
    },
    methods: {
        pushAdmin() {
            fetch("api/register",{
                method: "post",
                body:JSON.stringify(this.admin),
                headers:{
                    "content-type" : "application/json"
                }
            })
            .then(data=>{
                this.admin.vorname="";
                this.admin.nachname="";
                this.admin.email="";
                this.admin.password="";
                alert("succsess");
                location.reload();
                })
                
        }
    },
}

</script>



<style>

</style>