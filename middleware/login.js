import axios from 'axios'
import Cookie from 'js-cookie'
import config from '~/static/config'

export default async function({ redirect }) {
    if(Cookie.get("authToken") != null){
        await axios.get(`${config.API}${config.ApiStats}`, {headers:{
            "Content-Type": "application/json",
            'Authorization' : `Bearer ${Cookie.get("authToken")}`
        }}).then(response => {
            if (response.data.companyRoles != "Business Owner") {
                return redirect("/company/vendorIndex")
            } else {
                return redirect("/company/home")
            }
        }).catch(err => {
            if(Cookie.get("authToken")){
                Cookie.remove("authToken");
                Cookie.remove("authUserId");
                Cookie.remove("authName");
                Cookie.remove("authUserName");
                Cookie.remove("authCompanyName");
                Cookie.remove("authRole");
                Cookie.remove("authLastLogin");
                Cookie.remove("authimgName");
            }
            // return redirect("/Login")
        })
    }
}