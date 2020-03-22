<template>
<div>
    <form method="POST" :action="url_action" autocomplete="off">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="_method" value="PUT" v-if="edit_mode">

        <div class="form-group row" v-if="edit_mode">
            <label class="col-md-4 col-form-label text-md-right">ID</label>
            <div class="col-md-6">
                <input type="text" class="form-control" :value="data.id" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">NAME</label>
            <div class="col-md-6">
                <select class="custom-select custom-select-lg mb-3" name="name" v-model="name">
                    <option v-for="(val, key) in name_data" :key="key" :value="key">{{val}}</option>
                </select>
            </div>
        </div>

        <hr>

        <h3>HTML EDITOR</h3>
        <div class="text-left">
            <textarea id="editor" name="html"></textarea>
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
            name: 'download',
            name_data:{
                'download': 'DOWNLOAD',
                'information': 'INFORMATION',
                'donate': 'DONATE',
                'vote': 'VOTE',
                'share': 'SHARE',
            },
            html: '',
        }
    },
    methods:{
        fetch_data(){
            let data = this.data;
            let old = this.old_input;
            if(data && data.id){
                this.name = data.name;
                this.html = data.html;
                this.btn_submit = "CHANGE";
                this.edit_mode = true;
            }else if(old && old.title){
                this.name = old.name;
                this.html = old.html;
                this.edit_mode = false;
            }
        },
        initEditor(){
            $('#editor').trumbowyg({
                defaultLinkTarget: '_blank',
                autogrow: true,
                autogrowOnEnter: true,
            });
            $('#editor').trumbowyg('html', this.html);
        },
    },
    mounted(){
        this.fetch_data();
        this.initEditor();
    },
}
</script>