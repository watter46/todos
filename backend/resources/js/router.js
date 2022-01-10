import Router from 'vue-router'
import TodoList from '../views/Vue/TodoList.vue'
// import NotFound from './views/NotFound.vue'

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/todo',
      name: 'todo-list',
      component: TodoList
    },
  ]
});
