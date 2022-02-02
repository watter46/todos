
<!-- <div class="container" style="height: 95vh"> -->
    <!-- <div class="container text-wrap"> -->
      <!-- <div class="row flex-row flex-nowrap overflow-auto"> -->
        <!-- <div class="col-6 mr-4" style="height: 65vh" v-for="data in allData" v-bind:key="data.id"> -->

        <!-- タイトル一覧 -->

          <!-- <div class="input-group input-group-lg mb-3 border border-primary">
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center" aria-label="Text input with checkbox" 
              @change="editTitle($event)"  :value="data.title" :id="data.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="allDelete(data.id, data.title)">×</span>
          </div> -->
          
        <!-- タスク一覧 -->

          <!-- <div class="input-group mb-3 border border-white" v-for="tasks in data.tasks" v-bind:key="tasks.id">
            <div class="input-group-text border-0 bg-white">
              <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
            </div>
            <input type="text" class="form-control border-end-0 rounded-1 text-wrap" aria-label="Text input with checkbox" 
               @change="editTask($event)" :value="tasks.task" :id="tasks.id">
            <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span>
          </div>

          <div class="h1 font-weight-bold text-center" @click.prevent="addTextBox(data.tasks[0]['title_id'])">+</div> -->

        <!-- </div>
      </div>
    </div>
</div>
</template> -->


  <!-- <div class="container" style="height: 95vh">
      <div class="container text-wrap"> -->
        
        <!-- タイトルテスト -->
        <!-- <div class="row">
          <div class="" v-for="data in allData" v-bind:key="data.id">
            <div class="input-group input-group-lg mb-3 border border-primary">
              <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center"
                @change="editTitle($event)" :value="data.title" :id="data.id">
              <span class="input-group-text bg-white border-start-0" @click.prevent="allDelete(data.id, data.title)">×</span>
            </div>
          </div>
        </div> -->

        <!-- タスクテスト -->
        <!-- <div class="col-6 input-group mb-3 border border-white" v-for="tasks in showTask" v-bind:key="tasks.id">
          <div class="input-group-text border-0 bg-white">
            <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
          </div>
          <input type="text" class="form-control border-end-0 rounded-1 text-wrap" aria-label="Text input with checkbox" 
              @change="editTask($event)" :value="tasks.task" :id="tasks.id">
          <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span>
        </div>

        <div class="h1 font-weight-bold text-center" @click.prevent="addTextBox(data.tasks[0]['title_id'])">+</div>

      </div>
  </div>
</template> -->

<template>
  <div class="container">
    <div class="container text-wrap">
      
      <!-- タイトルテスト -->
      <div class="row flex-row flex-nowrap overflow-auto">
        <div class="input-group input-group-lg mb-3 border border-primary" v-for="titles in allData" v-bind:key="titles.id">
          <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center"
            @change="editTitle($event)" :value="titles.title" :id="titles.id">
          <span class="input-group-text bg-white border-start-0" @click.prevent="allDelete(titles.id, titles.title)">×</span>
        </div>
      </div>

      <!-- タスクテスト -->
      <!-- <div class="input-group mb-3 border border-white" v-for="tasks in allData" v-bind:key="tasks.id"> -->
        <!-- <div class="input-group-text border-0 bg-white">
          <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
        </div> -->
        <!-- <input type="text" class="form-control border-end-0 rounded-1 text-wrap" :value="data.tasks"> -->
        
        <!-- <input type="text" class="form-control border-end-0 rounded-1 text-wrap text-center"
            @change="editTitle($event)" :value="data.title" :id="data.id"> -->
        <!-- <input type="text" class="form-control border-end-0 rounded-1 text-wrap"
            @change="editTask($event)" :value="data.tasks" :id="tasks.id"> -->
        <!-- <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span> -->
      <!-- </div> -->

      <div v-for="tasks in test" v-bind:key="tasks.id">
        <input type="text" :value="tasks.task"><br>
        <input type="text" :value="tasks.comment">
      </div>

      <!-- タスクテスト -->
      <!-- <div class="input-group mb-3 border border-white" v-for="tasks in showTask" v-bind:key="tasks.id"> -->
        <!-- <div class="input-group-text border-0 bg-white">
          <input class="form-check-input mt-0" type="checkbox" v-model="tasks.done">
        </div> -->
        <!-- <input type="text" class="form-control border-end-0 rounded-1 text-wrap" :value="data.tasks"> -->
        <!-- テスト:{{ tasks.task }} -->
        <!-- <input type="text" class="form-control border-end-0 rounded-1 text-wrap"
            @change="editTask($event)" :value="data.tasks" :id="tasks.id"> -->
        <!-- <span class="input-group-text bg-white border-start-0" @click.prevent="deleteTask(tasks.id, tasks.done, tasks.task)">×</span> -->
      <!-- </div> -->

      <!-- <div class="h1 font-weight-bold text-center" @click.prevent="addTextBox(data.tasks[0]['title_id'])">+</div> -->

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
          }
        },
        computed: {
          test() {
            let index = 0
            return this.showTask[index]
          }
        },
        mounted() {
          axios.get('/api/task')
            .then((response) => {
            this.allData = response.data
            this.showTask = response.data.map(obj => obj.tasks)
            })
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
