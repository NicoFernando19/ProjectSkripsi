import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async listEmployee (perPage, page, name) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.ListEmployee}`, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
                perPage,
                page,
                name
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async CreateEmployee (data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.image != null)
            form.append('image', data.image)
        if(data.document != null)
            form.append('document', data.document)
        form.append('name', data.name);
        form.append('email', data.email);
        form.append('DoB', data.DoB);
        form.append('phoneNumber', data.phoneNumber);
        form.append('address', data.address);
        form.append('country', data.country);
        form.append('city', data.city);
        form.append('zip', data.zip);
        form.append('about', data.about);
        form.append('jobTitle', data.jobTitle);
        form.append('jobDesc', data.jobDesc);
        form.append('countryCode', data.countryCode);
        form.append('company_id', data.company_id);
        let result = {}
        await axios.post(`${config.API}${config.CreateEmployee}`, form, {
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

    async GetEmployeeById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailEmployee}/${data.id}`, {
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
    
    async UpdateEmployee (data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.image != null)
            form.append('image', data.image)
        if(data.document != null)
            form.append('document', data.document)
        form.append('name', data.name);
        form.append('email', data.email);
        form.append('DoB', data.DoB);
        form.append('phoneNumber', data.phoneNumber);
        form.append('address', data.address);
        form.append('country', data.country);
        form.append('city', data.city);
        form.append('zip', data.zip);
        form.append('about', data.about);
        form.append('jobTitle', data.jobTitle);
        form.append('jobDesc', data.jobDesc);
        form.append('countryCode', data.countryCode);
        form.append('company_id', data.company_id);
        let result = {}
        await axios.post(`${config.API}${config.UpdateEmployee}/${data.id}`, form, {
            headers:{
              "Content-Type": "multipart/form-data",
              Authorization: "Bearer " + token
            },
            params: {
                _method: 'PUT'
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },
    
    async UpdateEmployeeImage (data) {
        let token = Cookies.get('authToken')
        let form = new FormData()
        if(data.file != null)
            form.append('file', data.file)
        let result = {}
        await axios.post(`${config.API}${config.UpdateImageEmployee}/${data.id}`, form, {
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

    async DeleteEmployee (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteEmployee}/${data.id}`, {
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