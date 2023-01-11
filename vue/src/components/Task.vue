<template>

    <div @dblclick="$emit('toggle-reminder', task.id, task.reminder)" :class="[task.reminder ? 'reminder' : '', 'task']">
        <h4>{{ task.task_name }}

          <i @click="$emit('update-task', task)" class="fas fa-edit fas-update"></i>
          <i @click="$emit('delete-task',task.id)" class="fas fa-times fas-delete"></i>

        </h4>
        <p>{{ task.date }}</p>
    </div>

</template>

<script>
    export default{
        name: 'Task',
        props:{
            task: Object,
        },
       
    }
    
</script> 

<style scoped>

.fas-update{
  margin-left: 50%;
  color: #42b983;
}

.fas-delete{
    color:red;
}

.task{
    background:#f4f4f4;
    margin: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

.task.reminder{
    border-left: 5px solid green;
}

.task h4{
    display: flex;
    align-items: center;
    justify-content: space-between;
}


</style>