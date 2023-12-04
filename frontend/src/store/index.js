import {createLogger, createStore} from 'vuex'
import axios from "axios";

export const instance = axios.create();

export default createStore({
    state: {
        todos: [],
        user: null,
    },

    getters: {
        getTodos(state) {
            return state.todos;
        },
    },

    mutations: {
        setTodos(state, data) {
            state.todos = data;
        },

        setUserData(state, data) {
            state.user = data;
        },

        setTodoList(state, data) {
            state.todos.push(data);
        },
    },

    actions: {
        sendRequestGetTodos({commit}) {
            instance.get(process.env.VUE_APP_API_URL + '/todo-list').then(response => {
                commit('setTodos', response.data.data);
            }).catch(response => {

            });
        },

        sendRequestLoginUser({commit}, data) {
            instance.post(process.env.VUE_APP_API_URL + '/login', {
                email: data.email,
                password: data.password,
            }).then(response => {
                console.log(response.data.data);
                commit('setUserData', response.data.data.user);
                localStorage.setItem('access_token', response.data?.data.access_token);
            });
        },

        sendRequestGetUser({commit}) {
            instance.get(process.env.VUE_APP_API_URL + '/get-user')
                .then(response => {
                    commit('setUserData', response.data.data);
                }).catch(response => {
                    //
            });
        },

        sendRequestCreateTodoList({state, commit}, name) {
            instance.post(process.env.VUE_APP_API_URL + '/todo-list/create', {
                name: name,
                user_id: state.user.id
            }).then(response => {
                commit('setTodoList', response.data.data);
            }).catch(response => {
                //
            });
        },

        sendRequestCreateTodo({state, commit}, data) {
            instance.post(process.env.VUE_APP_API_URL + '/todo/create', {
                name: data.name,
                todo_list_id: data.todoListId
            }).then(response => {
                for (const todoList of state.todos) {
                    if (todoList.id === data.todoListId) {
                        todoList.todos.push(response.data.data);
                    }
                }
            }).catch(response => {
                //
            });
        },

        sendRequestDestroyTodoList({state, commit}, todoListId) {
            instance.delete(process.env.VUE_APP_API_URL + '/todo-list/delete/' + todoListId)
                .then(response => {
                    const result = state.todos.filter((todoList) => todoList.id !== todoListId);
                    console.log(result)
                    commit('setTodos', result);
                })
                .catch(response => {

                })
        },
    },

    modules: {}
})
