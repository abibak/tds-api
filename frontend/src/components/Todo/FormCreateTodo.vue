<template>
    <div class="form-create-todo">
        <form @submit.prevent>
            <input type="text" v-model="todoName" class="form-create-todo__input">
            <button class="button" @click="createTodo">Добавить заметку</button>
        </form>
    </div>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "FormCreateTodo",

    props: {
        todoListId: {
            type: Number,
            required: true,
        }
    },

    data() {
        return {
            todoName: '',
        }
    },

    methods: {
        ...mapActions(['sendRequestCreateTodo']),

        createTodo() {
            if (this.todoName.length > 0) {
                this.sendRequestCreateTodo({
                    name: this.todoName,
                    todoListId: this.todoListId
                });
                this.todoName = '';
            }
        },
    },
}
</script>

<style lang="scss" scoped>
.form-create-todo {
  margin-top: 20px;

  form {
    width: 100%;
    max-width: 600px;

    .form-create-todo__input {
      outline: none;
      max-width: 250px;
      padding: 0 5px;
      font-size: 16px;
      width: 100%;
      height: 20px;
      border-radius: 6px;
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