import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async GetContract(page, per_page) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListContract}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
                page,
                per_page
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async CreateContract (data) {
        let token = Cookies.get('authToken')
        let result = {}
        let form = new FormData()
        if(data.file != null)
            form.append('file', data.file)
        form.append('company_id', data.company.id)
        form.append('vendor_id', data.vendor.id)
        form.append('vacancy_id', data.vacancy.id)
        // form.append('workforce', data.workforce)
        form.append('start_date', data.startDate)
        form.append('end_date', data.endDate)
        form.append('jobFunction', data.jobFunction)
        form.append('jobDesc', data.jobDesc)
        form.append('requirement', data.requirement)
        await axios.post(`${config.API}${config.CreateContract}`, form, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async GetContractById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailContract}/${data.id}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async UpdateDocument (data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.file != null)
            form.append('file', data.file)
        let result = {}
        await axios.post(`${config.API}${config.UpdateDocumentContract}/${data.id}`, form, {
            headers:{
              "Content-Type": "undefined",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },
    
    async UpdateContract (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateContract}/${data.id}`, data, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async UpdateStatusContract (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateStatusContract}/${data.id}`, data, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }, 

    async DeleteContract (id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteContract}/${id}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    }
}