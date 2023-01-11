

<template>
  <div class="ScrollStyle">
   <div :key="task.id" v-for="task in tasks">
     <div v-if="task.deleted_status !== 1">
       <Task
           @toggle-reminder="$emit('toggle-reminder', task.id, task.reminder)"
           @delete-task="$emit('delete-task', task.id)" :task="task"
           @update-task="$emit('update-task', task)"
       />
     </div>
   </div>
  </div>
</template>


<script> 

import Task from './Task'

    export default{
        name: 'Tasks',

        props:{
            tasks: Array

        },

        components:{
            Task
        },
        emits:['delete-task', 'toggle-reminder', 'update-task'],

    }
</script>



<style scoped>
.ScrollStyle
{
  max-height: 600px;
  overflow-y: scroll;
}

</style>