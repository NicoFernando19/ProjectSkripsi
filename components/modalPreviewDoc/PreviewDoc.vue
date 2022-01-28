<template>
    <b-modal 
        size='xl' 
        ref="ModalPreview" 
        :id="id" 
        hide-footer
        @show="previewModal"
        >
        <template #modal-title>
            {{title}}
        </template>
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
        <div class="form-group text-right">
          <label class="btn btn-success">Change Document
              <input type="file" @change="onChange" name="file" id="image" style="visibility:hidden; position: absolute;">
          </label>
        </div>
        <div class="form-group">
          <b-alert variant="info" show><strong>Changing the document means chaning the current document!</strong></b-alert>
        </div>
        <embed :src="doc_src" width="100%" height="750px" />
    </b-modal>
</template>
<script>
import VueElementLoading from "vue-element-loading";
import ContractService from "../../store/services/contractServices/contract"
import Config from "../../static/config"
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: "PreviewDoc",
  layout: "dashboard",
  components: {
    VueElementLoading
  },
  props: {
    id: {type: String},
    title: { type: String },
    doc_src: { type: String },
    contract_id : { type: String }
  },
  data: () => {
    return {
      blockLoader: false,
      caption: "",
      alert: "",
      ErrorMessage: "",
      model: {
        id: '',
        file: ''
      }
    };
  },
  computed: {
    isSave() {
      // return this.form.isEdit ? this.$store.state.roleaccess.AllowEdit : true;
    }
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
    async onChange(e){
        this.model.file = e.target.files[0];
        this.model.id = this.contract_id;
        let result = await ContractService.UpdateDocument(this.model)
        if (result.status == 200) {
          await this.$parent.getContractDetail()
          this.doc_src = `${Config.StorageUrl}/${result.data.document}`
        } else {
          Toast.showToast("Updated Document", "Failed to change document!", "danger");
        }
    },
    handleToast(toastTitle, style, message) {
      this.$bvToast.toast(message, {
        title: toastTitle != "" ? toastTitle : "Confirmation",
        variant: style != "" ? style : "info",
        autoHideDelay: 5000,
        appendToast: false
      });
    },
    previewModal(){
        this.showLoader(true)
        this.showLoader(false)
    },
  }
};
</script>