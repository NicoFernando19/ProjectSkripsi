import { BToast } from 'bootstrap-vue'
export default {
    showToast(title, message, variant) {
        let bootStrapToaster = new BToast();
        bootStrapToaster.$bvToast.toast(message, {
          title: title,
          variant: variant,
          autoHideDelay: 5000,
          appendToast: false
        });
    },
}