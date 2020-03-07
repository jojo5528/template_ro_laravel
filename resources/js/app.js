require('./bootstrap');

require('trumbowyg/dist/trumbowyg');

window.Vue = require('vue');
window.Swal = require('sweetalert2');
import vueSmoothScroll from 'vue2-smooth-scroll';

Vue.use(vueSmoothScroll);

Vue.component('status_server', require('./components/Status_Server.vue').default);
Vue.component('news_filter', require('./components/News_Filter.vue').default);
Vue.component('news_editor', require('./components/News_Editor.vue').default);

$.trumbowyg.svgPath = window.location.origin+'/css/icons.svg';

const app = new Vue({
    el: '#app',
    methods:{
        Delete(url_action, url_back=null){
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "หากลบแล้วไม่สามารถย้อนคืนได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่! ลบเลย'
            }).then((res) => {
                if(res.value){
                    axios.delete(url_action).then((res) => {
                        if(res.data.message == "success"){
                            Swal.fire({
                                title: 'Truncated!',
                                text: 'ดำเนินการเรียบร้อย !',
                                icon: 'success',
                                timer: 1000,
                            });
                            this.Refresh(url_back);
                        }else{
                            Swal.fire({
                                title: 'Truncated!',
                                text: 'ล้มเหลว !',
                                icon: 'error',
                                timer: 1000,
                            });
                        }
                    });
                }
            });
        },
        Truncate(url_action, url_back=null){
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "หากลบแล้วไม่สามารถย้อนคืนได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่! ลบเลย'
            }).then((res) => {
                if(res.value){
                    axios.post(url_action).then((res) => {
                        if(res.data.message == "success"){
                            Swal.fire({
                                title: 'Truncated!',
                                text: 'ดำเนินการเรียบร้อย !',
                                icon: 'success',
                                timer: 1000,
                            });
                            this.Refresh(url_back);
                        }else{
                            Swal.fire({
                                title: 'Truncated!',
                                text: 'ล้มเหลว !',
                                icon: 'error',
                                timer: 1000,
                            });
                        }
                    });
                }
            });
        },
        Refresh(url_back=null, timer = 1100){
            return setTimeout(() => {
                if(url_back){
                    window.location = url_back;
                }else{
                    window.location.reload();
                }
            }, timer);
        },
    },
});
