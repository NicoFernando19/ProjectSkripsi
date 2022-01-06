<template>
    <div>
        <div class="card text-center p-4 m-3" style="width: 20.5rem; height: 18rem; cursor: pointer;" @show="Loader" @click="DetailCompany(company.id)">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
            <img class="card-img-top" :src="`${Url}/${company.imgName}`" :alt="company.imgName">
            <div class="card-body">
                <h5 class="card-title">{{ company.name }}</h5>
                <p class="card-text">{{ company.BidangUsaha }}</p>
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
        company: []
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
                path: `/company/detail?id=${id}`
            })
        }
    }
}
</script>