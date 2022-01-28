<template>
    <div>
        <div class="card shadow text-center p-4 m-3" style="width: 20.5rem; height: 18rem; cursor: pointer; border-color: #59D9CF;" @show="Loader"  @click="DetailVacancy(vacancy.id)">
            <div class="card-header p-0 bg-transparent border-0 mb-2 text-right" v-if="role == 'Vendor'">
                <span :class="['border', 'rounded', 'text-color','px-2 py-1', vacancy.status == 'Applied' ? 'border-success bg-success' : 'border-secondary bg-third']">
                    {{ vacancy.status == 'Applied' ? 'Applied' : 'Unapplied' }}
                </span>
            </div>
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
            <img class="card-img-top card-img-height" :src="`${Url}/${vacancy.company.imgName}`" :alt="vacancy.company.imgName">
            <!-- Tes -->
            <div class="card-body">
                <h5 class="card-title">{{ vacancy.Title }}</h5>
                <p class="card-text">{{ vacancy.jobType }}</p>
            </div>
            <div class="card-body p-0">
                <p class="text-muted m-0">Posted by: {{ vacancy.company.name }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import config from '../../static/config';
import VueElementLoading from "vue-element-loading"
import Cookie from 'js-cookie'

export default {
    components:{
        VueElementLoading
    },
    created() {
        this.role = Cookie.get('authRole')
    },
    data(){
        return{
            blockLoader: false,
            Url: config.StorageUrl,
            role : ''
        };
    },
    props: {
        vacancy: []
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
        DetailVacancy(id) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${'authRole'}=`);
            if (parts.length === 2){
                var role = parts.pop().split(';').shift()
            }
            if(role == 'Vendor'){
                this.$router.push({
                    path: `/vacancy/vendorDetail?id=${id}`
            })
            } else{
                this.$router.push({
                path: `/vacancy/detail?id=${id}`
            })
            }
            
        }
    }
}
</script>

<style scoped>
.card-img-height {
    height: 50% !important;
}
.text-color {
    font-weight: bold;
    color: #FFFFFF;
}
</style>