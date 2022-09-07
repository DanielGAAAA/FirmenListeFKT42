
import { createRouter, createWebHashHistory, createWebHistory } from "vue-router"
import Firmen from "../../resources/js/components/Firmen.vue";
import FirmenListe from "../../resources/js/components/FirmenListe.vue";
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
}


];

const router=createRouter({
    history:createWebHistory(),
    routes

})

export default router;