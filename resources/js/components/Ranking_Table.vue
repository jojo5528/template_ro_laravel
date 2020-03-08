<template>
<div class="col-lg-3 col-md-6">
    <table class="table table-sm table-striped table-bordered table-hover text-left">
        <thead :class="'text-center text-white '+css_bg">
            <tr>
                <th colspan="3"><h5>RANKING {{title}}</h5></th>
            </tr>
            <tr>
                <th>ลำดับ</th>
                <th>{{name}}</th>
                <th>แต้ม</th>
            </tr>
        </thead>
        <tbody v-if="data && data.length>0">
            <tr v-for="(item, index) in data" :key="index">
                <td>{{(index+1)}}</td>
                <td>{{item.name}}</td>
                <td>{{item.point}}</td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr>
                <th colspan="3" class="text-danger text-center"><i class="fas fa-times"></i> ขณะนี้ยังไม่มีการจัดอันดับ</th>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    props:[
        'title',
        'data',
        'css_bg',
        'name',
    ],
}
</script>