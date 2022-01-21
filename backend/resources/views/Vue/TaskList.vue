<template>
<div class="container border border-primary" style="height: 95vh">
  <div class="row justify-content-center align-items-center main-row">
    <div class="col shadow main-col bg-white">
    
    <div class="container text-wrap">
      <div class="row flex-row flex-nowrap overflow-auto">
        <div class="col-6 border border-success" style="height: 65vh" v-for="data in allData" v-bind:key="data.id">
          <div class="border border-danger h1 row">
            <input class="col-10 text-center" v-model="data.title">
            <div class="col-2 h2 font-weight-bold text-center" @click.prevent="deleteTask">×</div>
          </div>

          <div class="border border-primary h2 row" v-for="test in data.tasks" v-bind:key="test.id">
            <div class="col-1">
            <input type="checkbox" style="transform: scale(2);">
            </div>
            <input class="col-9" v-model="test.task">
            <div class="col-2 h2 font-weight-bold text-center" @click.prevent="deleteTask">×</div>
          </div>
          <div class="h1 font-weight-bold text-center" @click.prevent="addList">+</div>
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
                allData: []
            }
        },
        methods: {
            getJsonData() {
              axios.get('/api/task')
              .then((response) => {
              this.allData = response.data;
              });
            },
            addTask(title_id) {
            let value = this.$refs.newItem.value;
            console.log(value);
            console.log(title_id);
                // axios.post('/api/task/add', {
                //   task: this.newItem,
                //   title_id
                // })
                // .then((response) => {
                //   this.data = response.data;
                //   this.newItem = "";
                // });
            },
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
