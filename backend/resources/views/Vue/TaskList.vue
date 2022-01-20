<template>
<div class="container">
  <div class="row justify-content-center align-items-center main-row">
    <div class="col shadow main-col bg-white">
    
    <div class="container">
      <div class="row flex-row flex-nowrap overflow-auto">
        <div class="col-6 border border-success" v-for="data in allData" v-bind:key="data.id">
          <div class="border border-danger">
            {{ data.title }}
          </div>
          <div class="border border-primary" v-for="test in data.tasks" v-bind:key="test.id">
            {{ test.task }}
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                newItem: "",
                allData: [],
            }
        },
        methods: {
            // getJsonData(id) {
            //   axios.get('/api/task',{
            //     id: id
            //   })
            //   .then((response) => {
            //   this.allData = response.data;
            //   });
            // },
            getJsonData() {
              axios.get('/api/task')
              .then((response) => {
              this.allData = response.data;
              });
            },
            // addTask() {
            //     axios.post('/api/task/add', {
            //       task: this.newItem
            //     })
            //     .then((response) => {
            //       this.data = response.data;
            //       this.newItem = "";
            //     });
            // },
            // addTitle() {

            // },
            // deleteAllTask() {

            // },
            // deleteTask(task_id) {
            //     axios.post('/api/task/delete', {
            //       id: task_id 
            //     })
            //     .then((response) => {
            //       this.data = response.data
            //     });
            // },
        },
        mounted() {
            this.getJsonData();
        },
    }
</script>
