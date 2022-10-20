
import { createRouter, createWebHashHistory, createWebHistory } from "vue-router"
import Firmen from "../../resources/js/components/Firmen.vue";
import FirmenListe from "../../resources/js/components/FirmenListe.vue";
import Login from "../../resources/js/components/Login.vue";
const routes =[
{
    path: "/",
    name:"FirmenListe",
    component: FirmenListe
},

{
    path: "/firma",
    name:"Firma",
    component: Firmen
},
{
    path: "/login",
    name: "Login",
    component: Login
}


];

const router=createRouter({
    history:createWebHistory(),
    routes

})

export default router;