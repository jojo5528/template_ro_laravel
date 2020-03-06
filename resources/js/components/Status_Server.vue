<template>
<div class="container status_server">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-5 rounded-circle shadow box">
            <h1>STATUS</h1>
            <small>SERVER</small>
            <h3><i class="fas fa-server fa-4x"></i></h3>
            <h2 :class="status_class">{{status_text}}</h2>
        </div>
        <div class="col-lg-3 col-md-5 rounded-circle shadow box">
            <h1>PLAYER</h1>
            <small>ONLINE</small>
            <h3><i class="fas fa-gamepad fa-4x"></i></h3>
            <h2 class="text-warning">{{online}}</h2>
        </div>
        <div class="col-lg-3 col-md-5 rounded-circle shadow box">
            <h1>ACCOUNT</h1>
            <small>TOTAL</small>
            <h3><i class="fas fa-users fa-4x"></i></h3>
            <h2 class="text-warning">{{account}}</h2>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props:['status', 'online', 'account'],
        data(){
            return{
                status_text: 'ONLINE',
                status_class: 'text-success',
            }
        },
        methods:{
            check_status(){
                let str = this.status;
                if(str=="ONLINE"){
                    this.status_text = 'ONLINE';
                    this.status_class = 'text-success';
                }else if(str=="OFFLINE"){
                    this.status_text = 'OFFLINE';
                    this.status_class = 'text-danger';
                }else{
                    this.status_text = 'MAINT.';
                    this.status_class = 'text-warning';
                }
            },
        },
        mounted(){
            this.check_status();
        },
    }
</script>
