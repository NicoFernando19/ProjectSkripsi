<template>
<div class="createContract">
  <div class = "space"></div>
    <div class="container pb-5 pl-5 pr-5">
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
        <h1 class="text-center pt-4 pb-5">
        Edit Contract
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-group">
                    <label for="businessName">Business Company</label>
                    <input type="text" v-model="model.company.name" class="form-control" id="businessName" placeholder="Business Company Name" readonly>
                </div>
                <div class="form-group">
                    <label for="vendorName">Vendor Company</label>
                    <input type="text" v-model="model.vendor.name" class="form-control" id="vendorName" placeholder="Outsource Provide Name" readonly>
                </div>
                <div class="form-group">
                    <label for="jobFunction">Job Role</label>
                    <input type="text" v-model="model.jobFunction" class="form-control" id="jobFunction" placeholder="CS (Customer Service)/Digital Marketing" readonly>
                </div>
                <div class="form-group">
                    <label for="jobFunction">Job Description</label>
                    <input type="text" v-model="model.jobDesc" class="form-control" id="jobDescription" placeholder="Job Description" readonly>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="PostDate">Start Date Contract</label>
                    <input type="date" v-model="model.startDate" class="form-control" id="PostDate" readonly>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="Deadline">End Date Contract</label>
                    <input type="date" v-model="model.endDate" class="form-control" id="Deadline" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="workforce">Number of Workforce Needed</label>
                    <input type="number" v-model="model.workforce" class="form-control" id="workforce" placeholder="999" :readonly="role == 'Vendor'">
                </div>
                <div class="form-group">
                    <label for="requirement">Specifications / Requirements</label>
                    <textarea class="form-control" v-model="model.requirement" id="requirement" rows="3" :readonly="role == 'Vendor'"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-group" v-show="model.document == null">
                        <label for="document">Document</label>
                        <input type="file" @change="onChange" class="form-control-file" id="document">
                    </div>
                    <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 mb-2">
                        <div class="card p-4 m-3" style="width: 18rem;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Uploaded Document</h5>
                                <p class="card-text">Contract Agreement</p>
                                <b-button type="button" class="btn center-btn" 
                                    @click="$bvModal.show('PreviewDoc')" 
                                    variant="primary" 
                                    :disabled="model.document == null ? true : false"
                                    >
                                    Preview
                                </b-button>
                                <PreviewModal id="PreviewDoc" :contract_id="model.id" title="Contract Agreement" :doc_src="model.documentUrl" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Notes</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" v-model="model.feedbackNotes" rows="6" placeholder="All Good/Need Revision"></textarea>
                </div>
                <div class="space"></div>
                <div class="d-flex">
                    <button type="button" class="btn btn-secondary" @click="goBack()">Back</button>
                    <button type="button" id="submitBtn" class="btn btn-primary ml-auto" v-if="role == 'Business Owner'" @click="contract()">Save</button>
                    <button type="button" id="submitBtnR" class="btn btn-danger ml-auto" @click="contract('Revise')" v-show="model.status != 'Approved'" v-if="role == 'Vendor'">Revised</button>
                    <button type="button" id="submitBtnA" class="btn btn-success ml-auto" @click="contract('Approved')" v-show="model.status != 'Approved'" v-if="role == 'Vendor'">Approve</button>
                </div>
            </form>
            
        </div>
    </div>
  </div> 
</template>

<script>
import ContractService from '../../store/services/contractServices/contract'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import PreviewModal from '@/components/modalPreviewDoc/PreviewDoc'
import Cookie from 'js-cookie'

export default {
    name: 'create',
    middleware: 'auth',
    layout:'main',
    components: {
        VueElementLoading,
        PreviewModal
    },
    data: () => ({
        blockLoader: false,
        model: {
            id: '',
            company_id: '',
            vendor_id: '',
            contract: {
                id: ''
            },
            company: {
                id: '',
                name: ''
            },
            vendor: {
                id: '',
                name: ''
            },
            vacancy: {
                id: ''
            },
            workforce: '',
            jobFunction: '',
            jobDesc: '',
            startDate: '',
            endDate: '',
            requirement: '',
            document: '',
            documentUrl: null,
            status: '',
            feedbackNotes: '',
            file: ''
        },
        role: '',
    }),
    async created() {
        await this.getContractDetail()
        this.role = Cookie.get('authRole')
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
        onChange(e){
            this.model.file = e.target.files[0];
        },
        async contract(value) {
            this.showLoader(true)
            if (value != null || value != undefined) {
                document.getElementById("submitBtnA").disable = true;
                document.getElementById("submitBtnR").disable = true;
                this.model.status = value;
                let res = await ContractService.UpdateContract(this.model);
                if (res.status == 200) {
                    Toast.showToast("Updated Contract", "Updated Contract Success!", "success");
                } else {
                    Toast.showToast("Updated Contract", "Invalid Data!", "danger");
                }
            } else {
                document.getElementById("submitBtn").disable = true;
                let res = await ContractService.UpdateContract(this.model);
                if (res.status == 200) {
                    Toast.showToast("Updated Contract", "Updated Contract Success!", "success");
                } else {
                    Toast.showToast("Updated Contract", "Invalid Data!", "danger");
                }
            }
            this.showLoader(false)
        },
        async getContractDetail() {
            this.showLoader(true)
            this.model.contract.id = this.$route.query['id']
            let result = await ContractService.GetContractById(this.model.contract)
            if (result.status == 200) {
                console.log(result.data)
                this.populateData(result.data)
            } else {
                Toast.showToast("Load Data Contract", "Failed to Load Data!", "danger");
            }
            this.showLoader(false)
        },
        populateData(data) {
            this.model.id = data.id;
            this.model.company_id = data.company.id;
            this.model.vendor_id = data.vendor_id;
            this.model.contract.id = data.id;
            this.model.company.id = data.company.id;
            this.model.company.name = data.company.name;
            this.model.vendor.id = data.vendor.id;
            this.model.vendor.name = data.vendor.name;
            this.model.jobFunction = data.jobFunction;
            this.model.jobDesc = data.jobDesc;
            this.model.workforce = data.workforce;
            this.model.startDate = data.start_date;
            this.model.endDate = data.end_date;
            this.model.requirement = data.requirement;
            this.model.feedbackNotes = data.feedbackNotes;
            this.model.document = data.document;
            this.model.status = data.status;
            if (data.document != null) {
                this.model.documentUrl = "http://localhost:8000/storage/uploads/" + data.document
            }
        },
        goBack() {
            this.$router.push({
                path: '/contract/list'
            })
        }
    }
}
</script>

<style scoped>
.space{
    height: 30px;
}

.list-group{
    width: 100%;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}
</style>