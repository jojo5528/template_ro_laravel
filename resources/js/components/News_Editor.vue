<template>
<div>
    <form method="POST" :action="url_action" autocomplete="off">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="_method" value="PUT" v-if="edit_mode">

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">TYPE</label>
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="type" v-model="type">
                    <option v-for="(val, key) in type_data" :key="key" :value="key">{{val}}</option>
                </select>
            </div>
        </div>

        <div class="form-group row" v-if="edit_mode">
            <label class="col-md-4 col-form-label text-md-right">ID</label>
            <div class="col-md-6">
                <input type="text" class="form-control" :value="data.id" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">LINK_URL <small class="text-danger">ถ้าไม่ต้องการโยงลิงก์ภายนอก ให้เว้นว่างไว้</small></label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="link_url" v-model="link_url" placeholder="LINK_URL">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">IMAGE_URL <small class="text-danger">ฝากไฟล์จากเว็บอื่นแล้วนำ URL รูปมาใส่</small></label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="image_url" v-model="image_url" required placeholder="IMAGE_URL">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">TITLE</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="title" v-model="title" required placeholder="TITLE">
            </div>
        </div>

        <hr>

        <h3>DESC HTML EDITOR</h3>
        <div class="text-left">
            <textarea id="editor" name="desc"></textarea>
        </div>

        <div class="form-group row mb-0 align-items-center">
            <div class="col">
                <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-paper-plane"></i> {{btn_submit}}</button>
            </div>
        </div>
    </form>
</div>
</template>

<script>
export default {
    props:['csrf', 'url_action', 'data', 'old_input'],
    data(){
        return{
            edit_mode: false,
            btn_submit: 'CREATE',
            type: 1,
            type_data:{
                1: 'NEWS',
                2: 'EVENT',
                3: 'PROMOTION',
            },
            link_url: '',
            image_url: '',
            title: '',
            desc: '',
        }
    },
    methods:{
        fetch_data(){
            let data = this.data;
            let old = this.old_input;
            if(data && data.id){
                this.type = data.type;
                this.title = data.title;
                this.link_url = data.link_url;
                this.image_url = data.image_url;
                this.desc = data.desc;
                this.btn_submit = "CHANGE";
                this.edit_mode = true;
            }else if(old && old.title){
                this.type = old.type;
                this.title = old.title;
                this.link_url = old.link_url;
                this.image_url = old.image_url;
                this.desc = old.desc;
                this.edit_mode = false;
            }
        },
        initEditor(){
            $('#editor').trumbowyg({
                defaultLinkTarget: '_blank',
                autogrow: true,
                autogrowOnEnter: true,
            });
            $('#editor').trumbowyg('html', this.desc);
        },
    },
    mounted(){
        this.fetch_data();
        this.initEditor();
    },
}
</script>