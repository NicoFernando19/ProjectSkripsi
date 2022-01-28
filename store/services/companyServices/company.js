import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async listCompany (data, page, company_type) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.ListCompany}`, data, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
                page,
                company_type
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async CreateCompany (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.CreateCompany}`, data, {
            headers:{
              "Content-Type": "multipart/form-data",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async GetCompanyById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailCompany}/${data.id}`, {
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
    
    async UpdateCompany (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateCompany}/${data.id}`, data, {
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
    
    async UpdateCompanyImage (data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.file != null)
            form.append('file', data.file)
        let result = {}
        await axios.post(`${config.API}${config.UpdateImageCompany}/${data.id}`, form, {
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

    async DeleteCompany (id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteCompany}/${id}`, {
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