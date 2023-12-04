<template>
    <div class="todos">
        <div class="todos__item" v-for="todo in todos" :key="todo.id">
            <div class="todos__todo-name">
                <div>{{ todo.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TodoItem',

    props: {
        todos: {
            type: Array,
            required: true,
            default: []
        }
    },
}
</script>

<style lang="scss" scoped>
.todos {
  margin-top: 10px;

  .todos__item {
    margin-left: 15px;

    .todos__todo-name {
      padding-bottom: 10px;
    }

    .actions {
      display: flex;

      .action {
        cursor: pointer;
        border-radius: 8px;
        padding: 2px 8px;
        font-size: 14px;
      }

      .action__remove {
        color: #fff;
        background-color: #fd1515;
      }
    }
  }
}
</style>