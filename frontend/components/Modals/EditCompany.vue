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
        <b-form>
      <b-form-group
        id="input-group-1"
        label="Email address:"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          placeholder="Enter email"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.name"
          placeholder="Enter name"
          required
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
    </b-modal>
</template>
<script>
import VueElementLoading from "vue-element-loading";

export default {
  name: "PreviewDoc",
  layout: "dashboard",
  components: {
    VueElementLoading
  },
  props: {
    id: {type: String},
    title: { type: String },
    data: { type: Object }
  },
  data: () => {
    return {
      blockLoader: false,
      caption: "",
      alert: "",
      ErrorMessage: "",
      form: {
          id: "",
          email: "",
          name: ""
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
        this.form.name = this.data.name
        this.showLoader(false)
    },
  }
};
</script>