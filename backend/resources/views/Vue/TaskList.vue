
<template>
 <div class="container">
     <div class="container text-wrap">
       <div class="">
         <div class="mr-4 mb-5 border border-danger" v-for="data in allData" v-bind:key="data.id">

         <!-- タイトル一覧 -->

           <div class="input-group input-group-lg col-7 p-0 mb-3 border border-primary">
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center" 
              @change="editTitle($event)"  :value="data.title" :id="data.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="allDelete(data.id, data.title)">×</span>
          </div>
          
         <!-- タスク一覧 -->
          <div class="d-flex justify-content-start" v-for="tasks in data.tasks" v-bind:key="tasks.id">
            <div class="input-group col-6 mb-3 border border-white">
              <div class="input-group-text border-0 bg-white">
                <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
              </div>
              <input type="text" class="form-control border-end-0 rounded-1 text-wrap" 
                @change="editTask($event)" :value="tasks.task" :id="tasks.id">
              <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span>
            </div>
            <div>
              <p>{{ tasks }}</p>
            </div>
          </div>


          <div class="h1 font-weight-bold text-center" @click.prevent="addTextBox(data.tasks[0]['title_id'])">+</div>

         </div>
         
          {{testData}}
          <button @click="testAdd()">追加</button>
          <button @click="testDelete(2)">削除</button>

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
            showTask: [],
            allData: [],
            testData: [
              {
                "id":1,
                "tasks":
                  [
                    {"id":1, "task": "aaa"},
                    {"id":2, "task": "aaa2"}
                  ]
              },
              {
                "id":2,
                "tasks":
                  [
                    {"id":3, "task": "aaa3"},
                    {"id":4, "task": "aaa4"}
                  ]
              }
            ]
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
          testAdd() {
            this.testData.push({
                "id":3,
                "tasks":
                  [
                    {"id":4, "task": "aaa3"},
                    {"id":5, "task": "aaa4"}
                  ]
              })
            console.log(this.testData)
          },
          testDelete(id) { 
            let newObj = this.testData.filter(function(data){
              if(data.id !== id) return true;
            });

            this.testData = newObj;
            console.log(this.testData)
          }
        },
        mounted() {
          axios.get('/api/task')
            .then((response) => {
            this.allData = response.data
            // console.log(JSON.stringify(response.data, null, 2));
            this.showTask = response.data.map(obj => obj.tasks)
          })
        },
        computed: {
          findTask() {
            return function(index = 0) {
              return index
            }
          }
        },
        watch: {
          newTask: function (newTask) {
            if(!newTask && newTask !== null) {
            axios.post('/api/task/addNewTask', {
              id: newTask[0].id,
              task: newTask[0].task
            })
            .then((response) => {
              this.allData = response.data
            })
            } else {
              window.alert('タスクを入力してください')
              console.log(this.newTask)
              console.log(newTask)
              // this.newTask = []
            }

            if(newTask[0].task !== "" && newTask[0].task !== null) {
              console.log('空ではない')
              console.log(newTask[0].task)
              console.log(newTask)
            } else {
              window.alert('タスクを入力してください')
              this.newTask = ""
              console.log('空である')
              console.log(newTask)
            }
          },
          newTitle: function (newTitle) {
            if(newTitle !== null) {
            axios.post('/api/task/addNewTitle', {
              id: newTitle[0].id,
              title: newTitle[0].title
            })
            .then((response) => {
              this.allData = response.data
            })
            } else {
              window.alert('タイトルを入力して下さい')
            }
          }
        }
    }
</script>
