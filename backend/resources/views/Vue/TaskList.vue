<template>
<div class="container">
  <div class="row justify-content-center align-items-center main-row">
    <div class="col shadow main-col bg-white">
			<form>
        <div class="form-group">
          <div class="input-group">
              <input type="text" class="form-control" aria-label="Text input with checkbox" v-model="newItem">
              <button type="submit" class="btn btn-primary" @click.prevent="addTask">追加</button>
          </div>
        </div>
			</form>
      <ul class="list-group" v-for="data in allData" v-bind:key="data.id">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          {{ data.title }}
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center"
         v-for="tasks in data['tasks']" v-bind:key="tasks.id">
          {{ tasks.task }}
        </li>
        <button class="btn btn-outline-secondary bg-danger text-white" @click.prevent="deleteTask(task.id)">X</button>
      </ul>
    </div>
  </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                newItem: "",
                allData: []
            }
        },
        methods: {
            getJsonData() {
              axios.get('/api/get')
              .then((response) => {
              this.allData = response.data;
              });
            },
            addTask() {
                axios.post('/api/add', {
                  task: this.newItem
                })
                .then((response) => {
                  this.data = response.data;
                  this.newItem = "";
                });
            },
            deleteTask(task_id) {
                axios.post('/api/delete', {
                  id: task_id 
                })
                .then((response) => {
                  this.data = response.data
                });
            },
        },
        mounted() {
            this.getJsonData();
        },
    }
</script>
