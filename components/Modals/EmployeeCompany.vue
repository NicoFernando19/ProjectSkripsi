<template>
    <b-modal 
        size='xl' 
        ref="ModalEmployee" 
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
                        <h3>Employees</h3>
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
                                <b-form-select v-model="selected" :options="options" size="sm" class="ml-1" @change="getEmployee()"></b-form-select>
                                <span class="ml-1">
                                    entries
                                </span>
                            </div>
                        </div>
                        <div class="form-group m-0">
                            <input placeholder="Search By Title" type="text" id="filter" class="form-control" v-model='data.name'>
                        </div>
                        <div>
                            <b-button class="search-button" variant="primary" @click="getEmployee()">Search</b-button>
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
                        <h3>Employee</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="col-12 text-center">
                            <img class="detail-img" :src="imgUrl" width="25%" id="image" />
                        </div>
                        <div class="col-12 text-center my-3">
                            <label class="btn btn-success">Upload Photo
                                <input type="file" name="images" id="image" @change="loadImage" style="visibility:hidden; position: absolute;">
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-2" label="Name: *" label-for="inputName">
                            <b-form-input
                            id="inputName"
                            v-model="form.name"
                            placeholder="Enter Name"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-6" label="Email: *" label-for="inputEmail">
                            <b-form-input
                            id="inputEmail"
                            v-model="form.email"
                            placeholder="Enter Email"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-12" label="Position: *" label-for="inputJobTitle">
                            <b-form-input
                            id="inputJobTitle"
                            v-model="form.jobTitle"
                            placeholder="Enter Position"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-13" label="Description: *" label-for="inputJobDesc">
                            <b-form-textarea
                            id="inputJobDesc"
                            v-model="form.jobDesc"
                            placeholder="Enter Position Description"
                            required
                            ></b-form-textarea>
                        </b-form-group>
                    </div>
                    <div class="col-md-12">
                        <b-form-group id="input-group-3" label="Phone Number: *">
                            <b-input-group>
                                <template #prepend>
                                    <b-form-select v-model="countrySelected" :options="countryOptions" style="background-color: #F0F0F0"></b-form-select>
                                </template>

                                <b-form-input v-model="form.phoneNumber" type="number" placeholder="82123456789"></b-form-input>
                            </b-input-group>
                        </b-form-group>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="document">CV: *</label>
                        <b-form-file class="form-control-file" id="document" @change="onChange" accept="application/pdf"></b-form-file>
                        <small class="form-text text-info">PDF only</small>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="input-group-4" label="Date of Birth: *" label-for="DoB">
                            <b-form-datepicker
                            id="DoB"
                            v-model="form.DoB"
                            placeholder="Date of Birth"
                            required
                            ></b-form-datepicker>
                        </b-form-group>
                    </div>
                    <div class="col-md-3">
                        <b-form-group id="input-group-7" label="Country: *" label-for="inputCountry">
                            <b-form-input
                            id="inputCountry"
                            v-model="form.country"
                            placeholder="Enter Country"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-2">
                        <b-form-group id="input-group-8" label="City: *" label-for="inputCity">
                            <b-form-input
                            id="inputCity"
                            v-model="form.city"
                            placeholder="Enter City"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-1">
                        <b-form-group id="input-group-9" label="Zip: *" label-for="inputZip">
                            <b-form-input
                            id="inputZip"
                            v-model="form.zip"
                            placeholder="Zip"
                            required
                            ></b-form-input>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="input-group-10" label="Address: *" label-for="inputAddress">
                            <b-form-textarea
                            id="inputAddress"
                            v-model="form.address"
                            placeholder="Enter Address"
                            required
                            ></b-form-textarea>
                        </b-form-group>
                    </div>
                    <div class="col-md-6">
                        <b-form-group id="input-group-11" label="About: *" label-for="inputAbout">
                            <b-form-textarea
                            id="inputAbout"
                            v-model="form.about"
                            placeholder="Enter About"
                            required
                            ></b-form-textarea>
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
import Config from '../../static/config'
import Cookie from 'js-cookie'
import EmployeeServices from '../../store/services/employeeServices/employee'
import Moment from 'moment'
import CountryCode from 'country-telephone-data'

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
                countryCode: '',
                image: '',
                document: ''
            },
            items: [],
            fields: [
                {
                    key: 'name',
                    label: 'Name',
                    sortable: true,
                },
                {
                    key: 'DoB',
                    label: 'Date of Birth',
                    sortable: true,
                    formatter (value) {
                        let date = Moment(String(value)).format('D MMMM YYYY')
                        return date;
                    }
                },
                {
                    key: 'phoneNumber',
                    label: 'Phone',
                    sortable: true
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
            countryOptions: [],
            countrySelected: 62,
            imgUrl: ''
        };
    },
    mounted(){
        let countries = CountryCode.allCountries;
        countries.forEach(s => {
            this.countryOptions.push({ value: s.dialCode, text: `${s.name} (+${s.dialCode})` })
        })
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
            this.form.document = e.target.files[0];
        },
        async previewModal(){
            this.showLoader(true)
            await this.getEmployee()
            this.showLoader(false)
        },
        async getEmployee() {
            this.showLoader(true)
            let result = await EmployeeServices.listEmployee(this.selected, this.currentPage, this.data.name)
            if (result.status == 200) {
                this.items = result.data.data.data
                this.total = result.data.data.total
                this.currentPage = result.data.data.current_page
                this.perPage = result.data.data.per_page
            } else {
                Toast.showToast("Load Data","Failed to Load Employee data", "danger");
            }
            this.showLoader(false)
        },
        async handlePageChange(value) {
            this.currentPage = value;
            await this.getEmployee();
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
            this.form.name = '';
            this.form.email = '';
            this.form.DoB = '';
            this.form.phoneNumber = '';
            this.form.address = '';
            this.form.country = '';
            this.form.city = '';
            this.form.zip = '';
            this.form.about = '';
            this.form.jobTitle = '';
            this.form.jobDesc = '';
            this.form.imgName = '';
            this.form.company_id = Cookie.get('authUserId');
            this.form.docName = '';
            this.form.isActive = '';
            this.form.countryCode = '';
            this.form.image = '';
            this.form.document = '';
            this.imgUrl = '';
            this.toEdit = true;
        },
        ToEdit(data) {
            this.showLoader(true)
            this.panel1 = false;
            this.panel2 = true;
            this.toEdit = true;
            this.form.id = data.id;
            this.form.name = data.name;
            this.form.email = data.email;
            this.form.DoB = data.DoB;
            this.form.phoneNumber = data.phoneNumber;
            this.form.address = data.address;
            this.form.country = data.country;
            this.form.city = data.city;
            this.form.zip = data.zip;
            this.form.about = data.about;
            this.form.jobTitle = data.jobTitle;
            this.form.jobDesc = data.jobDesc;
            this.form.imgName = data.imgName;
            this.imgUrl = `${Config.StorageUrl}/${this.form.imgName}`;
            this.form.company_id = data.company_id;
            this.form.docName = data.docName;
            this.form.isActive = data.isActive;
            this.form.countryCode = data.countryCode;
            this.showLoader(false)
        },
        async ToDelete(data) {
            this.showLoader(true)
            this.form.id = data.id;
            this.form.name = data.name;
            this.form.email = data.email;
            this.form.DoB = data.DoB;
            this.form.phoneNumber = data.phoneNumber;
            this.form.address = data.address;
            this.form.country = data.country;
            this.form.city = data.city;
            this.form.zip = data.zip;
            this.form.about = data.about;
            this.form.jobTitle = data.jobTitle;
            this.form.jobDesc = data.jobDesc;
            this.form.imgName = data.imgName;
            this.imgUrl = `${Config.StorageUrl}/${this.form.imgName}`;
            this.form.company_id = data.company_id;
            this.form.docName = data.docName;
            this.form.isActive = data.isActive;
            this.form.countryCode = data.countryCode;
            let result = await EmployeeServices.DeleteEmployee(this.form)
            if (result.status == 200) {
                await this.getEmployee()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                Toast.showToast("Delete Data","Failed to Delete data", "danger");
            }
            this.showLoader(false)
        },
        async onSubmit() {
            document.getElementById("submitBtn").disabled = true
            this.form.countryCode = this.countrySelected;
            let res = await EmployeeServices.CreateEmployee(this.form)
            if (res.status == 201) {
                document.getElementById("submitBtn").disabled = false
                this.panel1 = true;
                this.panel2 = false;
                await this.getEmployee()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                document.getElementById("submitBtn").disabled = false
                Toast.showToast("Create Data","Failed to create!", "danger");
            }
        },
        async onEdit() {
            document.getElementById("submitBtn").disabled = true
            let res = await EmployeeServices.UpdateEmployee(this.form)
            if (res.status == 200) {
                document.getElementById("submitBtn").disabled = false
                this.panel1 = true;
                this.panel2 = false;
                await this.getEmployee()
                await this.$parent.getData()
                this.EmptyField()
            } else {
                document.getElementById("submitBtn").disabled = false
                Toast.showToast("Create Data","Failed to update!", "danger");
            }
        },
        loadImage(e) {
            this.form.image = e.target.files[0];
            this.imgUrl = URL.createObjectURL(e.target.files[0]);
        }
    }
}
</script>

<style scoped>
.search-button { margin: 0 1rem; }
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>