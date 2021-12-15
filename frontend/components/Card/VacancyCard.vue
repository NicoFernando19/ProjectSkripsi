<template>
    <div>
        <div class="card p-4 m-3" style="width: 18rem;" @show="Loader">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
            <img class="card-img-top" :src="`${Url}/${vacancy.company.imgName}`" :alt="vacancy.company.imgName">
            <!-- Tes -->
            <h4>Posted by: {{ vacancy.company.name }}</h4>
            <div class="card-body">
                <h5 class="card-title">{{ vacancy.Title }}</h5>
                <p class="card-text">{{ vacancy.jobType }}</p>
                <p class="card-text">{{ vacancy.jobDesc }}</p>
                <p class="card-text">{{ vacancy.Deadline }}</p>
                <p class="card-text">{{ vacancy.isActive }}</p>
                <button class="btn btn-primary center-btn" @click="DetailVacancy(vacancy.id)">Detail Vacancy</button>
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
            console.log(role)
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