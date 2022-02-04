<template>
    <div>
        <div class="card p-4 m-3 text-center" style="width: 20.5rem;" @show="Loader">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
            <img class="card-img-top card-img-height" :src="`${Url}/${company.imgName}`" :alt="company.imgName">
            <div class="card-body">
                <h5 class="card-title">{{ company.name }}</h5>
                <p class="card-text">{{ company.BidangUsaha }}</p>
                <button class="btn btn-primary center-btn" @click="DetailCompany(company.id, vacancyid)">Detail Company</button>
                <button class="mt-2 btn btn-success center-btn" @click="CreateContract(vacancyid, company.id)">Create Contract</button>
                <button class="mt-2 btn btn-danger center-btn" @click="Reject(vacancyid, company.id)">Reject</button>
            </div>
        </div>
    </div>
</template>

<script>
import config from '../../static/config';
import VueElementLoading from "vue-element-loading"
import Toast from '../../store/features/notificationToast/toast'
import VacancyServices from '../../store/services/vacancyServices/vacancy'

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
        company: [],
        vacancyid: ''
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
        DetailCompany(id, vacid) {
            this.$router.push({
                path: `/company/detail?id=${id}&vacancyid=${vacid}`
            })
        },
        CreateContract(vacid, compid) {
            this.$router.push({
                path: `/contract/create?vacancyid=${vacid}&vendorid=${compid}`
            })
        },
        async Reject(vacid, compid) {
            let result = await VacancyServices.DeleteJoinedCompanyVacancy(vacid, compid)
            if (result.status == '200') {
                await this.$parent.getData()
                Toast.showToast("Reject Company","Application rejected successfully", "danger");
            } else {
                Toast.showToast("Reject Action","Failed to do some action", "danger");
            }
        }
    }
}
</script>