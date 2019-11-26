<template>
    <div>
        <create-task v-on:task-created="addInList($event)" />
        <p v-if="isError">There is some error in fetching tasks list</p>
        <ul v-else>
            <li v-for="task in tasks" v-text="task"></li>
        </ul>
    </div>
</template>

<script>
    import CreateTask from "./CreateTaskComponent";
    export default {
      components: {
        CreateTask
      },
      data(){
        return {
          tasks: [],
          isError: false
        }
      },
      methods: {
        addInList(task){
          this.tasks.unshift(task)
        }
      },
      created() {
        axios.get('api/tasks')
          .then(({data}) => {
            this.tasks = data.tasks
          })
          .catch(({response}) => {
            this.isError = true
          });
      }
    }
</script>
