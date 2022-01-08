<template>
    <div>
        <div class="container my-5">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
            <b-button variant="secondary" @click="back()">
                <font-awesome-icon :icon="['fas', 'chevron-left']"/>
            </b-button>
            
            <h2>Detail Contract</h2>
            <div class="row">
                <div class="col-md-6">
                    <span>Contract Agreement</span>
                    <hr>
                    <embed :src="model.document" width="100%" height="800px" />
                </div>
                <div class="col-md-3">
                    <span>Detail</span>
                    <hr>
                    <div class="form-group">
                        <span class="text"><strong> Job Function </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> Job Description </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> Work Force </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> Company </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> Company Vendor </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> Start Date </strong></span>
                    </div>
                    <div class="form-group">
                        <span class="text"><strong> End Date </strong></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <span>Detail</span>
                    <hr>
                    <div class="form-group">
                        <span class="text">{{model.jobFunc}}</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.jobDesc}}</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.workForce}} Persons</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.companyName}}</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.vendorName}}</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.startDate}}</span>
                    </div>
                    <div class="form-group">
                        <span class="text">{{model.endDate}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ContractService from "../../store/services/contractServices/contract"
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import Moment from "moment"

export default {
    name: "Detail",
    layout: "main",
    middleware: "auth",
    components: {
        VueElementLoading
    },
    data: () => ({
        blockLoader: false,
        model: {
            id: '',
            jobFunc: '',
            jobDesc: '',
            workForce: '',
            companyName: '',
            vendorName: '',
            startDate: '',
            endDate: '',
            document: ''
        }
    }),
    async created() {
        await this.GetContract()
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
        back() {
            this.$router.push({
                path: "/contract/list"
            })
        },
        async GetContract() {
            this.showLoader(true)
            this.model.id = this.$route.query['id']
            let result = await ContractService.GetContractById(this.model)
            console.log(result.data)
            if (result.status = 200) {
                this.loadData(result.data)
            } else {
                Toast.showToast("Load Data","Failed on server", "danger");
            }
            this.showLoader(false)
        },
        loadData(result) {
            this.model.id = result.id
            this.model.jobFunc = result.jobFunction
            this.model.jobDesc = result.jobDesc
            this.model.workForce = result.workforce
            this.model.companyName = result.company.name
            this.model.vendorName = result.vendor.name
            this.model.startDate = Moment(String(result.start_date)).format('D MMMM YYYY')
            this.model.endDate = Moment(String(result.end_date)).format('D MMMM YYYY')
            this.model.document = "http://localhost:8000/storage/uploads/" + result.document
        }
    }
}
</script>

<style scoped>
.text {
    font-size: 1.5rem;
}
</style>