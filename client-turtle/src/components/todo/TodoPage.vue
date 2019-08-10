<template>
    <div class="todo">
        <input type="text"
               class="todo-input"
               placeholder="what needs to be done"
               v-model="newTodo"
               v-on:keyup.enter="addTodo">
        <div v-for="(todo, index) in todosFiltered" :key="todo.id" class="todo-item">
            <input type="checkbox" v-model="todo.completed" @dblclick="changeSelection(todo)">
            <div class="todo-item-left">
                <div v-if="!todo.editing"
                     class="todo-item-label"
                     @dblclick="editTodo(todo)"
                     :class="{ completed : todo.completed }">{{todo.title}}</div>
                <input v-else
                       class="todo-item-edit"
                       type="text"
                       v-model="todo.title"
                       v-on:blur="doneEdit(todo)"
                       v-on:keyup.enter="doneEdit(todo)"
                       @keyup.esc="cancelEdit(todo)"
                       v-focus>
                <div class="remove-item" v-on:click="removeTodo(index)">&times;</div>
            </div>

        </div>

        <div class="extra-container">
            <div>
                <label><input type="checkbox"
                              :checked="!anyRemaining"
                              @change="checkAllTodos">Check All</label>
            </div>
            <div>{{ remaining }} items left</div>
        </div>

        <div class="extra-container">
            <div>
                <button :class="{ active: filter == 'all' }" @click="filter='all'">All</button>
                <button :class="{ active: filter == 'active' }" @click="filter='active'">Active</button>
                <button :class="{ active: filter == 'completed' }" @click="filter='completed'">Completed</button>
            </div>
            <div>
                <button v-if="showClearCompletedButton"
                        @click="clearCompleted">Clear Completed</button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex'
export default {
  name: 'todo-list',
  data () {
    return {
      newTodo: '',
      beforeEditCache: '',
      filter: 'active'
    }
  },
  directives: {
    focus: {
      // directive definition
      inserted: function (el) {
        el.focus()
      }
    }
  },
  created () {
    this.$store.dispatch('getAllTodos')
  },
  computed: {
    ...mapState({
      taskStore: state => state.todoStore,
      userStore: state => state.userStore
    }),
    remaining () {
      return this.taskStore.tasks.filter(todo => !todo.completed).length
    },
    anyRemaining () {
      return this.remaining !== 0
    },
    todosFiltered () {
      this.$store.dispatch('increaseIdForTodo')
      if (this.taskStore.filter === 'all') {
        return this.taskStore.tasks
      } else if (this.taskStore.filter === 'active') {
        return this.taskStore.tasks.filter(todo => !todo.completed)
      } else if (this.taskStore.filter === 'completed') {
        return this.taskStore.tasks.filter(todo => todo.completed)
      }
      return this.taskStore.tasks
    },
    showClearCompletedButton () {
      return this.taskStore.tasks.filter(todo => todo.completed).length > 0
    }
  },
  methods: {
    addTodo () {
      if (this.newTodo.trim() === '') {
        return
      }
      let postData = {
        'title': this.newTodo,
        'user_id': this.userStore.authUser.id
      }
      this.$store.dispatch('addTask', postData)
      this.newTodo = ''
    },
    removeTodo (index) {
      console.log(index)
      let idDeletedTask = this.taskStore.tasks[index].id
      let postData = {
        'task_id': idDeletedTask,
        'index': index
      }
      this.$store.dispatch('deleteTask', postData)
    },
    editTodo (todo) {
      this.beforeEditCache = todo.title
      todo.editing = true
    },
    doneEdit (todo) {
      if (todo.title.trim() === '') {
        todo.title = this.beforeEditCache
      }
      todo.editing = false
    },
    cancelEdit (todo) {
      todo.title = this.beforeEditCache
      todo.editing = false
    },
    checkAllTodos () {
      this.taskStore.tasks.forEach((todo) => todo.completed = event.target.checked)
    },
    clearCompleted () {
      this.taskStore.tasks = this.taskStore.tasks.filter(todo => !todo.completed)
    },
    changeSelection (todo) {
      console.log(11111)
    }
  }
}
</script>

<style lang="scss">
    @import url("https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css");
    .todo {
        width: 50%;
        left: 50%;
        margin-left: 25%;
    }
    .todo-input {
        width: 100%;
        padding: 10px 18px;
        font-size: 18px;
        margin-bottom: 16px;
        &:focus {
            outline: 0;
        }
    }
    .todo-item {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        animation-duration: 0.3s;
    }
    .remove-item {
        cursor: pointer;
        margin-left: 14px;
        &:hover {
            color: black;
        }
    }
    .todo-item-left { // later
        display: flex;
        align-items: center;
    }
    .todo-item-label {
        padding: 10px;
        border: 1px solid white;
        margin-left: 12px;
    }
    .todo-item-edit {
        font-size: 24px;
        color: #2c3e50;
        margin-left: 12px;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc; //override defaults
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        &:focus {
            outline: none;
        }
    }
    .completed {
        text-decoration: line-through;
        color: grey;
    }
    .extra-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 16px;
        border-top: 1px solid lightgrey;
        padding-top: 14px;
        margin-bottom: 14px;
    }
    button {
        font-size: 14px;
        background-color: white;
        appearance: none;
        &:hover {
            background: lightgreen;
        }
        &:focus {
            outline: none;
        }
    }
    .active {
        background: lightgreen;
    }
    // CSS Transitions
    .fade-enter-active, .fade-leave-active {
        transition: opacity .2s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }
</style>