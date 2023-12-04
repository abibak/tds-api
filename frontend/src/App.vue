<template>
    <div class="main">
        <p class="todo-list-api">Todo List API</p>

        <div v-if="user === null">
            <form @submit.prevent>
                <label>email</label>
                <input type="text" v-model="email">

                <label>password</label>
                <input type="password" v-model="password">

                <button @click="login">Login</button>
            </form>

        </div>

        <div class="main__container" v-else>
            <FormCreateTodoList/>
            <TodoList/>
        </div>

    </div>
</template>

<script>

import {mapActions, mapState} from "vuex";
import {instance} from "@/store";
import TodoList from "@/components/TodoList/TodoList.vue";
import FormCreateTodoList from "@/components/TodoList/FormCreateTodoList.vue";

export default {
    name: 'App',
    components: {FormCreateTodoList, TodoList},

    mounted() {
        instance.interceptors.request.use((config) => {
            config.headers = {
                'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
            }

            return config;
        });

        this.sendRequestGetUser();
        this.sendRequestGetTodos();
    },

    data() {
        return {
            email: '',
            password: '',
        }
    },

    computed: {
      ...mapState(['user']),
    },

    methods: {
        ...mapActions(['sendRequestGetTodos', 'sendRequestGetUser', 'sendRequestLoginUser']),

        login() {
            this.sendRequestLoginUser({
                email: this.email,
                password: this.password,
            })
        },
    }
}
</script>

<style lang="scss">
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

#app {
  font-family: sans-serif;
  margin: 30px 0;
  color: #4b4848;
    font-size: 16px;

  .main {
    .todo-list-api {
      font-size: 32px;
      text-align: center;
    }
  }
}
</style>
