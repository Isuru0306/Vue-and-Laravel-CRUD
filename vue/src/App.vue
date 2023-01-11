<template>

  <div class="container">
    <Header 
    @toggle-add-task="toggleAddTask" 
    title="Task Tracker" :showAddTask="showAddTask" />

    <div v-if="showAddTask">
      <AddTask @add-task="addTask"/>
    </div>

    <div v-if="showUpdateTask">
      <UpdateTask :updatetask="update"/>
    </div>

    <Tasks 
    @toggle-reminder="toggleReminder"
    @delete-task="delateTask" :tasks="tasks"
    @update-task="toggleUpdate"
    />
  </div>
  
</template>

<script>
import Header from './components/Header';
import Tasks from './components/Tasks';
import AddTask from './components/AddTask';
import UpdateTask from './components/UpdateTask';

import axios from 'axios'


export default {
  name: 'App',

  components: {
    Header,
    Tasks,
    AddTask,
    UpdateTask,


  },
  data(){
    return{
      tasks:[],
      showAddTask: false,
      showUpdateTask: false,
      update:[]

    }
  },
  methods:{

    toggleUpdate(task){
      this.update = task
      // console.log(this.update);

      this.showUpdateTask = !this.showUpdateTask
    },

    toggleAddTask(){
       this.showAddTask = !this.showAddTask
    },

    addTask(task){
        this.tasks = [...this.tasks, task]
    },


    async delateTask(id){
       // console.log("task",id)
      // if(confirm("Are you sure?")){
        this.tasks = this.tasks.filter((task) => task.id != id)
        await
            axios
            .delete('http://127.0.0.1:8000/api/task-delete/'+id)
            .then(response => {
              console.log(response)
            }).catch(error => {
              console.log("Error..!", error)
            })
      // }
    },

    async toggleReminder(id, reminder){
      // console.log(id);
      this.tasks = this.tasks.map((task)=>
      task.id == id ?{
        ...task, reminder:!task.reminder
      } : task
      )
      // console.log(!reminder);
      //
      await
          axios
              .post('http://127.0.0.1:8000/api/task-update-reminder/' + id, {reminder: !reminder})
              .then(function (response){
                console.log(response);
              })
              .catch(function (error){
                console.log(error);
              })


    }
  },

  async created(){
    //method 01
    // const  response = await axios.get('http://127.0.0.1:8000/api/task')
    // this.tasks = response['data']
    // console.log(response['data'])


    //method 02
    // const res = await fetch('http://127.0.0.1:8000/api/task')
    // const data = await res.json()
    // console.log(this.tasks)


    //method 03
    axios
        .get('http://127.0.0.1:8000/api/task')
        .then(response =>{
          this.tasks = response.data
        })
        .catch(error =>{
          console.log(error)
        })
        .finally(()=> console.log(this.tasks))



  }
}
</script>







<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: 'Poppins', sans-serif;
}
.container {
  max-width: 500px;
  margin: 30px auto;
  overflow: auto;
  min-height: 300px;
  border: 1px solid steelblue;
  padding: 30px;
  border-radius: 5px;
}
.btn {
  display: inline-block;
  background: #000;
  color: #fff;
  border: none;
  padding: 10px 20px;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  font-size: 15px;
  font-family: inherit;
}
.btn:focus {
  outline: none;
}
.btn:active {
  transform: scale(0.98);
}
.btn-block {
  display: block;
  width: 100%;
}
</style>
