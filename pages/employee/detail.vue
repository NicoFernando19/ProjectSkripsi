<template>
    <div class="home" ref="profile">
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
        <div>
            <div class="container d-flex flex-column justify-content-between pt-5 detail-content">
            <div class="detail-left container text-center">
                <div class="row">
                    <div class="col-12">
                        <img class="detail-img" style="cursor: pointer;" :src="imgUrl" width="50%" />
                    </div>
                </div>
            </div>
            <div class="detail-right container">
                <div class="d-flex">
                    <h2 class="text-left pt-5 pb-3">
                    Employee Detail
                    </h2>
                </div>
                <div class="row">
                    <div class="col-6" style="border-right: 2px solid gray"> 
                    <div class="row">
                        <div class="col-6"><strong>Name</strong></div>
                        <div class="col-6">{{ employee.name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>City</strong></div>
                        <div class="col-6">{{ employee.city }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Date of Birth</strong></div>
                        <div class="col-6">{{ employee.DoB }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Phone</strong></div>
                        <div class="col-6"> <a :href="phone" target="_blank" class="text-decoration-none">{{ employee.phoneNumber }} </a></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Email</strong></div>
                        <div class="col-6"><a :href="mailtoMail" class="text-decoration-none">{{ employee.email }}</a></div>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="row">
                        <div class="col-6"><strong>Address</strong></div>
                        <div class="col-6">{{ employee.address }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>Country</strong></div>
                        <div class="col-6">{{ employee.country }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>About</strong></div>
                        <div class="col-6">{{ employee.about }}</div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="d-flex">
                    <h2 class="text-left pt-5 pb-3">
                        Employee CV
                    </h2>
                </div>
                <div>
                    <embed :src="employee.docName" width="100%" height="800px" />
                </div>
            </div>
            </div>
        </div> 
    </div>
</template>

<script>
import EmployeServices from '../../store/services/employeeServices/employee'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import config from '../../static/config';
import Moment from "moment"
import moment from 'moment'

export default {
    name: 'detail',
    layout: 'main',
    middleware: 'auth',
    components:{
        VueElementLoading
    },
    data() {
        return {
            blockLoader: false,
            StorageUrl: config.StorageUrl,
            imgUrl: '',
            phone: '',
            employee: {
                id: '',
                name: '',
                email: '',
                DoB: '',
                phoneNumber: '',
                address: '',
                country: '',
                city: '',
                zip: '',
                about: '',
                jobTitle: '',
                jobDesc: '',
                imgName: '',
                company_id: '',
                isActive: '',
                docName: '',
                countryCode: ''
            },
            mailtoMail: '',
        }
    },
    async mounted() {
        await this.GetData();
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
        async GetData() {
            this.showLoader(true)
            this.employee.id = this.$route.query['id'];
            let res = await EmployeServices.GetEmployeeById(this.employee)
            if (res.status == 200) {
                this.loadData(res);
                Toast.showToast("Load Data","Load Data Successfully", "success");
            } else {
                Toast.showToast("Load Data","Failed to load data from server", "danger");
            }
            this.showLoader(false)
        },
        loadData(res) {
            this.employee.email = res.data.email;
            this.mailtoMail = `mailto:${this.employee.email}`;
            this.employee.name = res.data.name;
            this.employee.DoB = Moment(String(res.data.DoB)).format('D MMMM YYYY');
            this.employee.phoneNumber = '0' + res.data.phoneNumber;
            this.employee.countryCode = res.data.countryCode;
            this.phone = `https://wa.me/${res.data.countryCode}${res.data.phoneNumber}`;
            this.employee.address = res.data.address;
            this.employee.country = res.data.country;
            this.employee.city = res.data.city;
            this.employee.zip = res.data.zip;
            this.employee.about = res.data.about;
            this.employee.jobTitle = res.data.jobTitle;
            this.employee.jobDesc = res.data.jobDesc;
            this.employee.imgName = res.data.imgName;
            this.imgUrl = `${this.StorageUrl}/${this.employee.imgName}`;
            this.employee.company_id = res.data.company_id;
            this.employee.docName = `${config.StorageUrl}/${res.data.docName}`;
        }
    }
}
</script>

<style scoped>
.detail-img{
    width: 50%;
    height: 450px;
    display: block;
    margin-right: auto;
    margin-left: auto;
}
</style>