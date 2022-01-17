import Router from 'vue-router'
import TaskList from '../views/Vue/TaskList.vue'
// import NotFound from './views/NotFound.vue'

export default  new Router({
  mode: 'history',
  routes: [
    {
      path: '/get',
      name: 'task-list',
      component: TaskList
    },
  ]
});
