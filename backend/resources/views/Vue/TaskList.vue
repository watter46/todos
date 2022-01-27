<template>
<div class="container" style="height: 95vh">
    <div class="container text-wrap">
      <div class="row flex-row flex-nowrap overflow-auto">
        <div class="col-6 mr-4" style="height: 65vh" v-for="data in allData" v-bind:key="data.id">

        <!-- タイトル -->
          <div class="input-group input-group-lg mb-3 border border-white">
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center" aria-label="Text input with checkbox" 
              @change="editTitle($event)"  :value="data.title" :id="data.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask">×</span>
          </div>
          
          
        <!-- タスク一覧 -->
          <div class="input-group mb-3 border border-white" v-for="tasks in data.tasks" v-bind:key="tasks.id">
            <div class="input-group-text border-0 bg-white">
              <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
            </div>
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap" aria-label="Text input with checkbox" 
               @change="editTask($event)" :value="tasks.task" :id="tasks.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id)">×</span>
          </div>

          <div class="h1 font-weight-bold text-center" @click.prevent="addTextBox(data.tasks[0]['title_id'])">+</div>
        </div>
      </div>
    </div>
</div>
</template>



<script>
    export default {
        data() {
          return {
            newTitle: [],
            newTask: [],
            allData: [],
          }
        },
        methods: {
          addTextBox(title_id) {
            axios.post('/api/task/addTextBox', {
              title_id: title_id,
            })
            .then((response) => {
              this.allData = response.data;
            });
          },
          deleteTask(id) {
            axios.post('/api/task/delete', {
              id: id
            })
            .then((response) => {
              this.allData = response.data;
            })
          },
          editTask(event) {
            this.newTask.push({
              id: event.target.id,
              task: event.target.value
            })
          },
          editTitle(event) {
            this.newTitle.push({
              id: event.target.id,
              title: event.target.value
            })
          }
        },
        mounted() {
          axios.get('/api/task')
            .then((response) => {
            this.allData = response.data
            })
        },
        watch: {
          newTask: function (newTask) {
            axios.post('/api/task/addNewTask', {
              id: newTask[0].id,
              task: newTask[0].task
            })
            .then((response) => {
              this.allData = response.data
            })
          },
          newTitle: function (newTitle) {
            axios.post('/api/task/addNewTitle', {
              id: newTitle[0].id,
              title: newTitle[0].title
            })
            .then((response) => {
              this.allData = response.data
            })
          }
        }
    }
</script>
