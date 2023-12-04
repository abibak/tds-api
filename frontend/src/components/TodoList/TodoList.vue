<template>
    <div class="todo-list">
        <div class="todo-list__container">
            <div class="todo-list__item" v-for="(todoList) in getTodos" :key="todoList.id">
                <div class="todo-list__info">
                    <div class="todo-list__name">{{ todoList.name }}</div>
                    <div class="actions" v-if="user.id === todoList.user_id">
                        <span class="action action__remove" @click="removeTodoList(todoList.id)">удалить</span>
                    </div>
                </div>

                <TodoItem :todos="todoList.todos"/>
                <FormCreateTodo :todo-list-id="todoList.id"/>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters, mapState} from "vuex";
import TodoItem from "@/components/Todo/TodoItem.vue";
import FormCreateTodo from "@/components/Todo/FormCreateTodo.vue";

export default {
    name: "TodoList",
    components: {FormCreateTodo, TodoItem},

    computed: {
        ...mapState(['user']),
        ...mapGetters(['getTodos']),
    },

    methods: {
        ...mapActions(['sendRequestDestroyTodoList']),

        removeTodoList(id) {
            this.sendRequestDestroyTodoList(id);
        },
    }
}
</script>

<style lang="scss" scoped>
.todo-list {
    display: flex;
    justify-content: center;

    .todo-list__container {
        max-width: 800px;
        width: 100%;


        .todo-list__item {
            margin-top: 30px;

            .todo-list__name {
                font-weight: bold;
                color: #707070;
                font-size: 22px;
            }

            .todo-list__info {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;

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
    }
}
</style>