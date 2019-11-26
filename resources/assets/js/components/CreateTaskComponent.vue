<template>
    <form method="post" @submit.prevent="addTask">
        <input type="text" placeholder="Add new" v-model="task" v-on:input="error = ''" />
        <span v-if="error">{{ error }}</span>
    </form>
</template>

<script>
    export default {
      data(){
        return {
          task: '',
          error: ''
        }
      },
      methods: {
        addTask(){
          if(!this.task){
            this.error = "Required field"
          }
          else {
            axios.post('api/tasks', {
              task: this.task
            })
              .then(() => {
                this.task = ''
            })
              .catch(({response}) => {
                this.error = response.data.errors.task[0]
              });
          }
        }
      }
    }
</script>
