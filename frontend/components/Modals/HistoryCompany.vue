<template>
    <b-modal 
        size='xl' 
        ref="ModalCompany" 
        :id="id" 
        hide-footer
        @show="previewModal"
        >
        <template #modal-title>
            {{title}}
        </template>
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
        <div v-show="panel1">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <div class="text-left">
                        <h3>Work Histories</h3>
                    </div>
                    <div class="text-right mr-3">
                        <b-button variant="success" @click="ToCreate()">
                            <font-awesome-icon :icon="['fas', 'plus']"/> Create
                        </b-button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="container d-flex p-0 mt-2">
                        <div class="mr-auto">
                            <div class="d-flex align-items-center mt-2">
                                <span>
                                    Show
                                </span>
                                <b-form-select v-model="selected" :options="options" size="sm" class="ml-1" @change="getWorkHistory()"></b-form-select>
                                <span class="ml-1">
                                    entries
                                </span>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <input placeholder="Search By Name" type="text" id="filter" class="form-control" v-model='data.name'>
                        </div>
                        <div>
                            <b-button class="search-button" variant="primary" @click="getWorkHistory()">Search</b-button>
                        </div>
                    </div>
                    <b-table 
                        striped 
                        hover 
                        :items="items" 
                        :fields="fields" class="mt-3">
                        <template #cell(Actions)="row">
                            <b-button size="sm" class="mr-2" @click="ToEdit(row.item)">
                                Edit
                            </b-button>
                            <b-button size="sm" class="mr-2" @click="ToDelete(row.item)" variant="danger">
                                Delete
                            </b-button>
                        </template>    
                    </b-table>

                    <div class="container d-flex justify-content-center">
                        <b-pagination
                            v-model="currentPage"
                            :per-page="perPage"
                            :total-rows="total"
                            aria-controls="notifications-table"
                            @change="handlePageChange"
                        ></b-pagination>
                    </div> 
                </div>
            </div>
        </div>
        <div v-show="panel2">
            <b-form @submit.stop.prevent="toEdit ? onEdit() : onSubmit()">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Work History</h3>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-2" label="Title:" label-for="inputName">
                            <b-form-input
                            id="inputName"
                            v-model="form.Title"
                            placeholder="Enter name"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="input-group-4" label="Start Date:" label-for="startDate">
                            <b-form-datepicker
                            id="startDate"
                            v-model="form.startDate"
                            placeholder="Start Date"
                            required
                            ></b-form-datepicker>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="input-group-4" label="End Date:" label-for="endDate">
                            <b-form-datepicker
                            id="endDate"
                            v-model="form.endDate"
                            placeholder="End Date"
                            required
                            ></b-form-datepicker>
                        </b-form-group>
                    </div>
                </div>
                

                
                <div class="d-flex justify-content-end">
                    <b-button type="button" class="mr-3" variant="light" @click="goToList()">Cancel</b-button>
                    <b-button type="submit" id="submitBtn" variant="primary">Submit</b-button>
                </div>
            </b-form>
        </div>
    </b-modal>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import Toast from '../../store/features/notificationToast/toast'
import Cookie from 'js-cookie'
import WorkHistoryServices from '../../store/services/WorkHistoryServices/WorkHistory'
import Moment from 'moment'

export default {
    name: "HistoryCompany",
    components: {
        VueElementLoading
    },
    props: {
        id: {type: String},
        title: { type: String }
    },
    data: () => {
        return {
            panel1: true,
            panel2: false,
            toEdit: false,
            blockLoader: false,
            caption: "",
            alert: "",
            ErrorMessage: "",
            form: {
                id: '',
                Title: '',
                startDate: '',
                endDate: ''
            },
            items: [],
            fields: [
                {
                    key: 'Title',
                    label: 'Description',
                    sortable: true,
                },
                {
                    key: 'startDate',
                    label: 'Start Contract',
                    sortable: true,
                    formatter (value) {
                        let date = Moment(String(value)).format('D MMMM YYYY')
                        return date;
                    }
                },
                {
                    key: 'endDate',
                    label: 'End Contract',
                    sortable: true,
                    formatter (value) {
                        let date = Moment(String(value)).format('D MMMM YYYY')
                        return date;
                    }
                },
                {
                    key: 'Actions'
                }
            ],
            data: {
                name:''
            },
            currentPage: 1,
            total: 0,
            perPage: 0,
            selected: 5,
            options: [
                { value: 5, text: '5' },
                { value: 10, text: '10' },
                { value: 25, text: '25' },
                { value: 50, text: '50' }
            ],
        };
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
        async previewModal(){
            this.showLoader(true)
            await this.getWorkHistory()
            this.showLoader(false)
        },
        async getWorkHistory() {
            this.showLoader(true)
            let result = await WorkHistoryServices.ListWorkHistory(this.selected, this.currentPage)
            if (result.status == 200) {
                this.items = result.data.data.data
                this.total = result.data.data.total
                this.currentPage = result.data.data.current_page
                this.perPage = result.data.data.per_page
            } else {
                Toast.showToast("Load Data","Failed to Load Work History data", "danger");
            }
            this.showLoader(false)
        },
        async handlePageChange(value) {
            this.currentPage = value;
            await this.getWorkHistory();
        },
        goToList() {
            this.showLoader(true)
            this.panel1 = true;
            this.EmptyField()
            this.panel2 = false;
            this.toEdit = false;
            this.showLoader(false)
        },
        ToCreate() {
            this.showLoader(true)
            this.panel1 = false;
            this.EmptyField()
            this.panel2 = true;
            this.toEdit = false;
            this.showLoader(false)
        },
        EmptyField() {
            this.form.id = '';
            this.form.Title = '';
            this.form.startDate = '';
            this.form.endDate = '';
            this.toEdit = true;
        },
        ToEdit(data) {
            this.showLoader(true)
            this.panel1 = false;
            this.panel2 = true;
            this.toEdit = true;
            this.form.id = data.id;
            this.form.Title = data.Title;
            this.form.startDate = data.startDate;
            this.form.endDate = data.endDate;
            this.showLoader(false)
        },
        async ToDelete(data) {
            this.showLoader(true)
            this.form.id = data.id;
            this.form.Title = data.Title;
            this.form.startDate = data.startDate;
            this.form.endDate = data.endDate;
            let result = await WorkHistoryServices.DeleteWorkHistory(this.form)
            if (result.status == 200) {
                await this.getWorkHistory()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                Toast.showToast("Delete Data","Failed to Delete data", "danger");
            }
            this.showLoader(false)
        },
        async onSubmit() {
            document.getElementById("submitBtn").disabled = true
            let res = await WorkHistoryServices.CreateWorkHistory(this.form)
            if (res.status == 201) {
                document.getElementById("submitBtn").disabled = false
                this.panel1 = true;
                this.panel2 = false;
                await this.getWorkHistory()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                Toast.showToast("Create Data","Failed to create!", "danger");
            }
        },
        async onEdit() {
            document.getElementById("submitBtn").disabled = true
            let res = await WorkHistoryServices.UpdateWorkHistory(this.form)
            if (res.status == 200) {
                document.getElementById("submitBtn").disabled = false
                this.panel1 = true;
                this.panel2 = false;
                await this.getWorkHistory()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                Toast.showToast("Create Data","Failed to create!", "danger");
            }
        },
    }
}
</script>

<style scoped>
.search-button { margin: 0 1rem; }
</style>