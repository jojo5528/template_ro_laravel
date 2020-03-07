<template>
<div>
    <div class="row bg-white rounded shadow my-3 p-3">
        <div class="col m-0 p-0">
            <form method="POST" :action="url_action">
                <fieldset>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-3 my-0 p-0 mx-1">
                            <label>เรียงลำดับ</label>
                            <select class="custom-select custom-select-lg mb-3" v-model="order_type">
                                <option v-for="(value, key) in order_type_data" :key="key" :value="key">{{value}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 my-0 p-0 mx-1">
                            <label>ประเภท</label>
                            <select class="custom-select custom-select-lg mb-3" v-model="type">
                                <option v-for="(value, key) in type_data" :key="key" :value="key">{{value}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 my-0 p-0 mx-1" v-if="last_page>1">
                            <label>หน้า</label>
                            <select class="custom-select custom-select-lg mb-3" v-model="page">
                                <option v-for="(value, key) in page_data" :key="key" :value="key">{{value}}</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
            </form>
            <p>จำนวนทั้งหมด <b class="badge badge-info badge-pill">{{total}}</b> บทความ / แสดง <b class="badge badge-danger badge-pill">{{data.length}}</b> บทความ ({{from}}-{{to}}) / จำนวนหน้า <b class="badge badge-info badge-pill">{{last_page}}</b></p>
        </div>
    </div>

    <div class="row" v-if="data">
        <div class="col-md-4 my-2" v-for="(item, index) in data" :key="index">
            <div class="card">
                <a :href="item.link_url" target="_blank">
                    <img class="card-img-top newslogo" :src="item.image_url" :alt="'NEWS#'+item.id">
                </a>
                <div class="card-body">
                    <h5 class="card-title" v-html="item.type_html"></h5>
                    <h5 class="card-title">#{{item.id}} {{item.title}}</h5>
                    <hr>
                    <a :href="item.link_url" target="_blank" class="btn btn-primary btn-block">
                        <i class="fas fa-hand-point-right"></i> READ <i class="fas fa-hand-point-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" v-else>
        <div class="col">
            <h1 class="text-danger text-center">ขณะนี้ยังไม่มีข่าวสาร</h1>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props:[
        'url_action'
    ],
    data(){
        return{
            order_type: 1,
            order_type_data:{
                1: 'ใหม่ล่าสุด',
                2: 'เก่าที่สุด',
            },
            type: 0,
            type_data:{
                0: 'ทั้งหมด',
                1: 'NEWS',
                2: 'EVENT',
                3: 'PROMOTION',
            },
            data:[],
            order_key: 'id',
            order_dir: 'desc',
            page: 1,
            page_data:{
                1:1
            },
            total: 0,
            from: 0,
            to: 0,
            last_page: 1,
        }
    },
    methods:{
        fetch_data(page=1){
            let obj = this;
            obj.page = page;
            axios.post(this.url_action, {
                page: page,
                order_key: this.order_key,
                order_dir: this.order_dir,
                type: this.type,
            }).then(res => {
                let data = res.data;

                for(var i=1;i<=data.last_page;i++){
                    obj.$set(obj.page_data, i, i);
                }

                obj.data = data.data;
                obj.last_page = data.last_page;
                obj.total = data.total;
                obj.from = data.from;
                obj.to = data.to;
                console.log(data.data);
            });
        },
    },
    mounted(){
        this.fetch_data();
    },
    watch:{
        order_type(val){
            val = parseInt(val);
            if(val==1){
                this.order_dir = 'desc';
            }else{
                this.order_dir = 'asc';
            }
            this.fetch_data();
        },
        type(val){
            this.fetch_data();
        },
        page(val){
            this.fetch_data(val);
        }
    },
}
</script>