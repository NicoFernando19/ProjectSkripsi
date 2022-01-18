import axios from 'axios'
import config from '~/static/config';
import Cookies from 'js-cookie';

export default {
    async listVacancy(data, page) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.ListVacancy}`, data, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
              page
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },

    async CreateVacancy(PostDate, Deadline, Title, jobType, jobDesc, NumWorkforce, Budget, Requirement, isActive) {
        let token = Cookies.get('authToken')
        let res = {};
        const vacancyDto = { PostDate, Deadline, Title, jobType, jobDesc, NumWorkforce, Budget, Requirement, isActive };
        await axios.post(`${config.API}${config.CreateVacancy}`, vacancyDto, {
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            }
        }).then(response => {
            res = response;
        }).catch(err => {
            res = err.response;
        })
        return res;
    },

    async Vacancy (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.CreateVacancy}`, data, {
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

    async GetVacancyById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailVacancy}/${data.id}`, {
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

    async GetJoinedById (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.get(`${config.API}${config.DetailJoinedVacancy}/${data.id}`,{
            headers:{
              "Content-Type": "application/json",
              Authorization: "Bearer " + token
            },
            params: {
                company_id: data.company_id
            }
        }).then(response => {
            result = response;
        }).catch(err => {
            result = err.response;
        })
        return result
    },
    
    async UpdateVacancy (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateVacancy}/${data.id}`, data, {
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
    
    async UpdateStatusVacancy (data) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.put(`${config.API}${config.UpdateStatusVacancy}/${data.id}`, data, {
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

    async DeleteVacancy (id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.delete(`${config.API}${config.DeleteVacancy}/${id}`, {
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

    async joinVacancy (data, id) {
        let token = Cookies.get('authToken')
        let result = {}
        await axios.post(`${config.API}${config.JoinVacancy}/${id}`, data, {
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