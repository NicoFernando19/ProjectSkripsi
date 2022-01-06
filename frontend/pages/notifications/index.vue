<template>
    <div>
        <div class="container my-5">
            <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
            <h2>All Notifications</h2>
            <div class="container d-flex p-0 mt-4">
                <div class="mr-auto">
                    <div class="d-flex align-items-center mt-2">
                        <span>
                            Show
                        </span>
                        <b-form-select v-model="selected" :options="options" size="sm" class="ml-1" @change="GetAllNotif()"></b-form-select>
                        <span class="ml-1">
                            entries
                        </span>
                    </div>
                </div>
                <div class="form-group m-0">
                    <input placeholder="Search By Name" type="text" id="filter" class="form-control" v-model='data.name'>
                </div>
                <div>
                    <b-button class="search-button" variant="primary" @click="GetAllNotif()">Search</b-button>
                </div>
            </div>
            <b-table 
                striped 
                hover 
                :items="items" 
                :fields="fields" class="mt-3">
                <template #cell(data)="row">
                    <strong v-if="row.item.read_at == null">{{ row.item.data }}</strong>
                    <span v-else>{{ row.item.data }}</span>
                </template> 
                <template #cell(vacancy_links)="row">
                    <b-button size="sm" @click="toVacancy(row.item.vacancyLink, row.item.id)" class="mr-2">
                        Go to Vacancy
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
</template>

<script>
import NotificationService from "../../store/services/notificationServices/notification"
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import Moment from "moment"

export default {
    inheritAttrs: true,
    name: "Notifications",
    layout: "main",
    middleware: 'auth',
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
            key: 'data',
            label: 'Description',
            sortable: true,
          },
          {
            key: 'created_at',
            label: 'Time',
            sortable: true,
            formatter: 'formatDate'
          },
          {
              key: 'vacancy_links'
          }
        ],
        data: {
            name:''
        },
        currentPage: 1,
        total: 0,
        perPage: 0
    }),
    async mounted() {
        await this.GetAllNotif();
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
        async GetAllNotif(){
            this.showLoader(true)
            let result = await NotificationService.listAllNotification(this.currentPage, this.selected, this.data.name)
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
            await this.GetAllNotif();
        },
        formatDate(value) {
            let date = Moment(String(value)).format('D MMMM YYYY hh:mm')
            return date;
        }, 
        async toVacancy(value, id) {
            let result = await NotificationService.updateReadAtNotif(id);
            if (this.$root.$children[2].$refs.navbar != null) {
                await this.$root.$children[2].$refs.navbar.getNotif();
            }
            this.$router.push({
                path: value
            })
        }
    }
}
</script>

<style scoped>
.search-button { margin: 0 1rem; }
</style>
