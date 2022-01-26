<template>
<div class="container" style="height: 95vh">
    <div class="container text-wrap">
      <div class="row flex-row flex-nowrap overflow-auto">
        <div class="col-6 mr-4" style="height: 65vh" v-for="data in allData" v-bind:key="data.id">

        <!-- タイトル -->
          <div class="input-group input-group-lg mb-3 border border-white">
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center" aria-label="Text input with checkbox" 
              v-bind:value="data.title">
            <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask">×</span>
          </div>
          
          
        <!-- タスク一覧 -->
          <div class="input-group mb-3 border border-white" v-for="test in data.tasks" v-bind:key="test.id">
            <div class="input-group-text border-0 bg-white">
              <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
            </div>
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap" aria-label="Text input with checkbox" 
               @change="addTask($event)" :value="test.task" :id="test.id" :title="test.title_id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(test.id)">×</span>
            {{ test.title_id }}
            {{ test.id }}
          </div>

          <div class="h1 font-weight-bold text-center" @click.prevent="addList(data.tasks[0]['title_id'])">+</div>
        </div>
      </div>
    </div>
</div>
</template>



<script>
    export default {
        data() {
          return {
            input: "",
            allData: [],
          }
        },
        methods: {
          addList(title_id) {
            axios.post('/api/task/addList', {
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
          addTask(event) {
            // this.$set(this.newItem, 'id', id)
            // this.$set(this.newItem, 'title_id', title_id)
            // this.$set(this.newItem, 'task', event.target.value)
            // console.log(this.newItem)
            this.input = event.target
            console.log("id: " + event.target.id)
            console.log("title_id: " + event.target.title)
            console.log("task: " + event.target.value)
          }
        },
        mounted() {
          axios.get('/api/task')
            .then((response) => {
            this.allData = response.data;
            });
        },
        watch: {
          input: function (event) {
            console.log(event.id)
            console.log(event.title)
            console.log(event.value)
          }
        }
    }
</script>
