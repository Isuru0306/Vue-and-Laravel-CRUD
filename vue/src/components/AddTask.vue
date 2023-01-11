<template>

    <form @submit="onSubmit">
        <div class="form-control">
            <label >Task</label>
            <input type="text" v-model="task_name" name="text" placeholder="Add Task">
        </div>
        <div class="form-control">
            <label>Day & Time</label>
            <input type="date" v-model="date" name="day" placeholder="Add date & Time">
        </div>
        <div class="form-control-check">
            <label >Set Remider</label>
            <input type="checkbox" v-model="reminder" name="reminder">
        </div>

        <input type="submit" value="Save Task" class="btn btn-block">

    </form>
</template>


<script>
    import axios from "axios";


    export default{
        name: "AddTask",
        data(){
            return{
              task_name: '',
              date: '',
              reminder: false,
            }
        },
        methods:{
            async onSubmit(e){
                e.preventDefault();
                if(!this.task_name){
                    alert('Please add a task')
                    return
                }

              let data = {
                task_name: this.task_name,
                date: this.date,
                reminder: this.reminder
              }

              this.$emit('add-task', data)
              // console.log(newTask)
              this.text = ''
              this.day = ''
              this.reminder = false



                //Method 01
              //   const requestOptions = {
              //     method : "POST",
              //     headers: { "Content-Type": "application/json" },
              //     body: JSON.stringify({
              //           task_name: this.task_name,
              //           date: this.date,
              //           reminder: this.reminder
              //     })
              //   }
              //
              // console.log(requestOptions)
              // const response = await fetch("http://127.0.0.1:8000/api/task-add", requestOptions);
              // const data = await response.json();
              // console.log(data)

              //method 02
             await axios
                  .post('http://127.0.0.1:8000/api/task-add', data)
                  .then(function (response){
                    console.log(response);
                  })
                  .catch(function (error){
                    console.log(error);
                  })

              //Method 03 without API
                // const newTask ={
                //     id: Math.floor(Math.random() * 100),
                //     text: this.text,
                //     day: this.day,
                //     reminder: this.reminder
                // }




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