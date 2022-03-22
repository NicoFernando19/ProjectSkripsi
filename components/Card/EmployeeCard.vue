<template>
    <div>
        <div class="card shadow text-center p-4 m-2" style="width: 12.5rem; height: 15rem; cursor: pointer; border-color: #59D9CF;" @show="Loader" @click="DetailCompany(employee.id)">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
            <img class="card-img-top card-img-height" :src="`${Url}/${employee.imgName}`" :alt="employee.imgName">
            <div class="card-body">
                <h5 class="card-title" style="font-size:0.9rem">{{ employee.name }}</h5>
                <p class="card-text">{{ employee.bio }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import config from '../../static/config';
import VueElementLoading from "vue-element-loading"

export default {
    components:{
        VueElementLoading
    },
    data(){
        return{
            blockLoader: false,
            Url: config.StorageUrl
        };
    },
    props: {
        employee: []
    },
    methods: {
        showLoader(val) {
            if (!val) {
                setTimeout(() => {
                this.blockLoader = false;
                }, 500);
            } else {
                this.blockLoader = val;
            }
        },
        Loader() {
            this.showLoader(true);
            this.showLoader(false);
        },
        DetailCompany(id) {
            this.$router.push({
                path: `/employee/detail?id=${id}`
            })
        }
    }
}
</script>

<style>
.card-img-height {
    height: 70% !important;
}
</style>
