<template>
    <div>
        <!-- As a heading -->
        <nav class="navbar navbar-dark bg-dark text-light">
        <span class="navbar-brand mb-0 h1">Navbar</span>
          <span class="navbar-brand mb-0 h1">{{userid}}</span>
        </nav>
        <!-- This is Index Dashboard{{fname}} -->
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Tasks</th>
                    <th scope="col">Assigned To</th>
                    <th scope="col">Done Task?</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" :key="task.id">
                    <td>{{task.name}}</td>
                    <td v-if="task.assignto">{{task.assignto}}</td>
                    <td>
                        <div class="form-check">
                                <input v-if="task.isdone==0" class="form-check-input" type="checkbox" value="0" @click="done(task)" >
                                <input v-else class="form-check-input" type="checkbox" value="1" checked @click="undone(task)">
                            </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal" @click="edit(task)">edit</button>
                        <button type="button" class="btn btn-danger" @click="remove(task)">del</button>
                    </td>
                    </tr>
                    <tr>
                    <td> <div class="form-group">
                            <input type="text" id="name" class="form-control" placeholder="Input Your Task" v-model="form.name">
                        </div>
                    </td>
                    <td> <div class="form-group">
                            <!-- <input type="text" class="form-control" placeholder="Select Assignee" v-model="form.assignto"> -->
                                <select v-model="form.assignto" class="form-select">
                                    <option v-for="user in users" v-bind:key="user.id" v-bind:value="user.fullname">
                                        {{user.fullname}}
                                    </option>
                            </select>
                        </div>
                    </td>
                    <td> <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="0" v-model="form.isdone">
                        </div>
                    </td>
                    <td><button type="button" class="btn btn-primary" @click="submit(form)">+</button></td>
                    </tr>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title {{editMode?'Edit':'New'}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" placeholder="Input Your Task" v-model="formEdit.name">
                        </div>
                        <div class="form-group">
                            <select v-model="formEdit.assignto" class="form-select">
                                    <option v-for="user in users" v-bind:key="user.id" v-bind:value="user.fullname">
                                        {{user.fullname}}
                                    </option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"  @click="update(formEdit)">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</template>
<script>

export default {
 props: ['tasks', 'users'],
 data(){
     return{
         editMode: false,
         form:{
            name:null,
            assignto:null,
            isdone:0,
         },
         formEdit:{
            name:null,
            assignto:null,
            isdone:null,
         }
     }
 },
 methods:{
    submit:function(){
        this.$inertia.post('/task',this.form)
    },
    remove:function(task){
         this.$inertia.delete(`/task/${task.id}`, task)
    },
    edit: function (task) {
            this.formEdit = Object.assign({}, task);
            this.editMode = true;
            this.openModal();
        },
    update: function (task) {
        this.$inertia.patch(`/task/${task.id}`, this.formEdit)
        },
    done: function (task) {
        this.$inertia.put(`/done/${task.id}`)
        },
    undone: function (task) {
        this.$inertia.put(`/undone/${task.id}`)
        }, 
    }
}
</script>
