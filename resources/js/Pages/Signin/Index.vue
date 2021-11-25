<template>
    <div>
        <div class="login-form">
                <h2 class="text-center">Log in</h2>       
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="required" v-model="form.username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="required" v-model="form.password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"  @click="login(form)">Log in</button>
                </div>       
        </div>
    </div>
</template>
<script>

export default {
 data(){
     return{
         form:{
             username:null,
             password:null,
         },
     }
 },
 methods:{
        login:function(){
           this.$inertia.post('/signin',this.form)
        },
    }
}
</script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>