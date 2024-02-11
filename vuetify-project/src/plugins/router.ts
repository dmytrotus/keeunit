import {createRouter, createWebHistory} from "vue-router";
import Home from "@/pages/Home.vue";
import Implementation from "@/pages/Implementation.vue";
import Instructions from "@/pages/Instructions.vue";
import Implementation2 from "@/pages/Implementation2.vue";

const routes = [
  { path: '/', component: Home },
  { path: '/instructions', component: Instructions },
  { path: '/implementation', component: Implementation },
  { path: '/implementation2', component: Implementation2 },
]
const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
