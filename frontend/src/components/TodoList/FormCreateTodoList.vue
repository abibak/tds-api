<template>
    <div class="form-create-todo-list">
        <form @submit.prevent>
            <input type="text" v-model="todoListName" class="form-create-todo-list__input">
            <button class="button" @click="createTodoList">Добавить список дел</button>
        </form>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "FormCreateTodoList",

    data() {
        return {
            todoListName: '',
        }
    },

    methods: {
        ...mapActions(['sendRequestCreateTodoList']),

        createTodoList() {
          if (this.todoListName.length > 1) {
              this.sendRequestCreateTodoList(this.todoListName);
              this.todoListName = '';
          }
        },
    },
}
</script>

<style lang="scss" scoped>

.form-create-todo-list {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;

    form {
        width: 100%;
        max-width: 600px;
        text-align: center;

        .form-create-todo-list__input {
            outline: none;
            max-width: 300px;
            padding: 0 5px;
            font-size: 18px;
            width: 100%;
            height: 25px;
            border-radius: 8px;
            border: 1px solid #000;
        }

        .button {
            border-radius: 8px;
            height: 25px;
            padding: 5px;
            outline: none;
            border: none;
            margin-left: 10px;
            cursor: pointer;
        }
    }
}

</style>