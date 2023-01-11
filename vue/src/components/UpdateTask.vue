<template>

  <form @submit="onSubmit">
    <div class="form-control">
      <label >Task</label>
      <input type="text" v-model="u_task_name" name="text" placeholder="Add Task">
    </div>
    <div class="form-control">
      <label>Day & Time</label>
      <input type="date" v-model="u_date" name="day" placeholder="Add date & Time">
    </div>
    <div class="form-control-check">
      <label >Set Remider</label>
      <input type="checkbox" v-model="u_reminder" name="reminder">
    </div>

    <input type="submit" value="Update Task" class="btn btn-block">

  </form>

</template>

<script>
// import axios from "axios";

import axios from "axios";

export default {
  name: "UpdateTask",

  props: { updatetask: Object },

  data() {
    return {
      id:this.updatetask.id,
      u_task_name: this.updatetask.task_name,
      u_date: this.updatetask.date,
      u_reminder: !!this.updatetask.reminder,
    }
  },

  methods:{
    async onSubmit(){
      let data = {
        task_name: this.u_task_name,
        date: this.u_date,
        reminder: this.u_reminder
      }


      await
          axios
              .put('http://127.0.0.1:8000/api/task-update/'+this.id, data)
              .then(function (response){
                console.log(response);
              })
              .catch(function (error){
                console.log(error);
              })

      this.id =''
      this.u_task_name =''
      this.u_date = ''
      this.u_reminder =''


    }
  }

}
</script>






<style scoped>

.add-form {
  margin-bottom: 40px;
}
.form-control {
  margin: 20px 0;
}
.form-control label {
  display: block;
}
.form-control input {
  width: 100%;
  height: 40px;
  margin: 5px;
  padding: 3px 7px;
  font-size: 17px;
}
.form-control-check {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.form-control-check label {
  flex: 1;
}
.form-control-check input {
  flex: 2;
  height: 20px;
}

</style>