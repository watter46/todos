import Router from 'vue-router'
import TaskList from '../views/Vue/TaskList.vue'
// import NotFound from './views/NotFound.vue'

export default  new Router({
  mode: 'history',
  routes: [
    {
      path: '/task',
      name: 'task-list',
      component: TaskList
    },
    // {
    //   path: '/task/{id}',
    //   name: 'task-list',
    //   component: TaskList
    // }
  ]
});
