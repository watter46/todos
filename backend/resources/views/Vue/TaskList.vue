
<template>
 <div class="container">
     <div class="container text-wrap">
       <div class="">
         <div class="mr-4 mb-5 border border-danger" v-for="data in allData" v-bind:key="data.id">

         <!-- タイトル一覧 -->

           <div class="input-group input-group-lg col-7 p-0 mb-3 border border-primary">
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center" v-model="data.title" @change="editTitle($event)" :id="data.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="allDelete(data.id, data.title)">×</span>
          </div>
          
         <!-- タスク一覧 -->
          <div class="d-flex justify-content-start" v-for="tasks in data.tasks" v-bind:key="tasks.id">
            <div class="input-group col-6 mb-3 border border-white">
              <div class="input-group-text border-0 bg-white">
                <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
              </div>
              <input type="text" class="form-control border-end-0 rounded-1 text-wrap" v-model="tasks.task" @change="editTask($event)" :id="tasks.id">
              <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span>
            </div>
            <div>
              <p>{{ tasks }}</p>
            </div>
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
            newTitle: {id: "", title: ""},
            newTask: {id: "", task: ""},
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
          editTask(event) {
            console.log("追加前")
            console.log(this.newTask)
            const newObject = {
              id: event.target.id,
              task: event.target.value
            }

            this.newTask = Object.assign({}, this.newTask, newObject)
            console.log("editTask")
            console.log(this.newTask)
          },
          editTitle(event) {
            console.log("追加前")
            console.log(this.newTask)
            const newObject = {
              id: event.target.id,
              title: event.target.value
            }

            this.newTitle = Object.assign({}, this.newTitle, newObject)
            console.log("editTitle")
            console.log(this.newTitle)
          },
          deleteTask(id, done, task) {
            if (done || !task) {
              axios.post('/api/task/delete', {
                id: id
              })
              .then((response) => {
                this.allData = response.data;
              })
            } else {
              window.alert('タスクが終わっていません')
            }
          },
          allDelete(id, title) {
            let result = window.confirm('タイトル:' + title + 'のタスク全てを削除しますか？')
            if (result) {
              axios.post('/api/task/allDelete', {
                id: id
              })
              .then((response) => {
                this.allData = response.data;
              })
            } else {
              return
            }
          },
        },
        mounted() {
          axios.get('/api/task')
            .then((response) => {
            this.allData = response.data
          })
        },
        watch: {
          newTask: function (newTask) {
            if(newTask.task !== "" && newTask.task !== null) {
              axios.post('/api/task/addNewTask', {
              id: newTask.id,
              task: newTask.task
            })
            } else {
              window.alert('タスクを入力してください')
            }
          },
          newTitle: function (newTitle) {
            if(newTitle.title !== "" && newTitle.title !== null) {
            axios.post('/api/task/addNewTitle', {
              id: newTitle.id,
              title: newTitle.title
            })
            } else {
              window.alert('タイトルを入力して下さい')
            }
          },
        }
    }
</script>
