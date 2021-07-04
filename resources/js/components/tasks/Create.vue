<template>
    <div>
        <h3 class="text-center">Create Task</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTask">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="task.name" required>
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="task.detail" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                task: {},
                todo: [],
                detail: [],

            }
        },
        methods: {
            
            addTask() {
                 
                this.axios
                    .post('/api/tasks', this.task)
                    .then(response => (
                        this.$router.push({ name: 'TasksIndex' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>