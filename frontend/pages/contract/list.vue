<template>
    <div>
        <div class="container my-5">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
            <h2>All Contracts</h2>
            <div class="container d-flex p-0 mt-4">
                <div class="mr-auto">
                    <div class="d-flex align-items-center mt-2">
                        <span>
                            Show
                        </span>
                        <b-form-select v-model="selected" :options="options" size="sm" class="ml-1" @change="getContracts()"></b-form-select>
                        <span class="ml-1">
                            entries
                        </span>
                    </div>
                </div>
                <div class="form-group m-0">
                    <input placeholder="Search By Name" type="text" id="filter" class="form-control" v-model='data.vendor'>
                </div>
                <div>
                    <b-button class="search-button" variant="primary">Search</b-button>
                </div>
            </div>
            <b-table 
                striped 
                hover 
                :items="items" 
                :fields="fields" class="mt-3">
                <template #cell(status)="row">
                    <span :class="['border', 'rounded', 'px-2 py-1', row.item.status == 'Approved' ? 'text-white border-success bg-success' : row.item.status == 'Revise' ? 'text-white border-third bg-third' : row.item.status == 'Reject' ? 'text-white border-danger bg-danger' : row.item.status == 'Cancel' ? 'text-white border-danger bg-danger' : 'text-white border-secondary bg-secondary']">
                        {{ row.item.status == 'Approved' ? 'Approved' : row.item.status == "Revise" ? "Revise" : row.item.status == "Cancel" ? 'Cancel' : row.item.status == "Reject" ? 'Rejected' : 'Waiting' }}
                    </span>
                </template>
                <template #cell(contract_details)="row">
                    <b-button size="sm" variant="info" @click="toDetail(row.item.id)" class="mr-2">
                        <font-awesome-icon :icon="['fas', 'file-alt']"/>
                    </b-button>
                    <b-button size="sm" variant="warning" @click="toEdit(row.item.id)" :class="{'mr-2' : true, 'd-none' : (row.item.status == 'Reject' || row.item.status == 'Cancel') }" v-show="row.item.status != 'Approved'">
                        <font-awesome-icon :icon="['fas', 'edit']"/>
                    </b-button>
                </template>
                <template #cell(action)="row">
                    <div v-show="!(row.item.status == 'Reject' || row.item.status == 'Cancel')">
                        <b-button size="sm" variant="danger" @click="toChangeStat(row.item.id, 'Cancel')" class="mr-2" v-show="role == 'Business Owner'">
                            Cancel
                        </b-button>
                        <b-button size="sm" variant="danger" @click="toChangeStat(row.item.id, 'Reject')" class="mr-2" v-show="role == 'Vendor'">
                            Reject
                        </b-button>
                    </div>
                </template>   
            </b-table>

            <div class="container d-flex justify-content-center">
                <b-pagination
                    v-model="currentPage"
                    :per-page="perPage"
                    :total-rows="total"
                    aria-controls="contracts-table"
                    @change="handlePageChange"
                ></b-pagination>
            </div> 
        </div>
    </div>
</template>

<script>
import ContractService from "../../store/services/contractServices/contract"
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import Moment from "moment"
import Cookie from "js-cookie"

export default {
    inheritAttrs: true,
    name: "Contracts",
    layout: "main",
    middleware: "auth",
    components: {
        VueElementLoading
    },
    data: () => ({
        blockLoader: false,
        selected: 10,
        options: [
          { value: 10, text: '10' },
          { value: 25, text: '25' },
          { value: 50, text: '50' },
          { value: 100, text: '100' }
        ],
        items: [],
        fields: [
          {
            key: 'jobFunction',
            label: 'Job',
            sortable: true,
          },
          {
            key: 'company.name',
            label: 'Company Name',
            sortable: true,
          },
          {
            key: 'vendor.name',
            label: 'Vendor Name',
            sortable: true,
          },
          {
            key: 'start_date',
            label: 'Start Contract',
            sortable: true,
            formatter: 'formatDate'
          },
          {
            key: 'end_date',
            label: 'End Contract',
            sortable: true,
            formatter: 'formatDate'
          },
          {
            key: 'created_at',
            label: 'Created Time',
            sortable: true,
            formatter: 'formatDate'
          },
          {
              key: 'status'
          },
          {
              key: 'contract_details',
              label: 'Contract Action'
          },
          {
              key: 'action',
              label: 'Action'
          }
        ],
        data: {
            vendor:''
        },
        model: {
            id: '',
            status: ''
        },
        currentPage: 1,
        total: 0,
        perPage: 0,
        role: ''
    }),
    async mounted() {
        await this.getContracts();
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
        async getContracts(){
            this.showLoader(true)
            let result = await ContractService.GetContract(this.currentPage, this.selected)
            if (result.status == 200) {
                this.items = result.data.data.data
                this.total = result.data.data.total
                this.currentPage = result.data.data.current_page
                this.perPage = result.data.data.per_page
            }else{
                Toast.showToast("Load Data","Failed on server", "danger");
            }
            this.showLoader(false)
        },
        async handlePageChange(value) {
            this.currentPage = value;
            await this.getContracts();
        },
        formatDate(value) {
            let date = Moment(String(value)).format('D MMMM YYYY')
            return date;
        }, 
        async toDetail(value) {
            this.$router.push({
                path: `/contract/detail?id=${value}`
            })
        },
        async toEdit(value) {
            this.$router.push({
                path: `/contract/edit?id=${value}`
            })
        },
        async toChangeStat(id,value) {
            this.model.id = id;
            this.model.status = value
            let result = await ContractService.UpdateStatusContract(this.model)
            if (result.status == 200) {
                await this.getContracts();
            }else{
                Toast.showToast("Update Data","Failed on server", "danger");
            }
        }
    }
}
</script>

<style scoped>
.search-button { margin: 0 1rem; }
</style>
