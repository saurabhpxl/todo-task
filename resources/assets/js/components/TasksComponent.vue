<template>
    <div>
        <create-task />
        <ul>
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
          tasks: ['A', 'B', 'C']
        }
      },
      mounted() {
        console.log('Component mounted.')
      }
    }
</script>
