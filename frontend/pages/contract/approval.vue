<template>
<div class="vendorApproval">
  <navbar-web />
  <div class = "space"></div>
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Contract Approval
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-group">
                    <label for="inputAddress">Business Company</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="PT ABC">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Vendor Company</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="PT XYZ">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Number of Workforce Needed</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="999">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Job Function</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="IT/Digital Marketing/Research">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Specifications / Requirements</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </form>

            <div class="space"></div>
            <div class="space"></div>
            <div class="d-flex" style="max-width: fit-content;">
                <h3>Uploaded Documents</h3>
            </div>

            <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 mb-2">
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Document 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary center-btn">Download</a>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Document 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary center-btn">Download</a>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Document 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary center-btn">Download</a>
                    </div>
                </div>
            </div>
            
            <div class="space mt-4"></div>
            <label for="exampleFormControlTextarea1">Notes</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="All Good/Need Revision"></textarea>


            <div class="space"></div>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-danger mr-4">Revised</a>
                <a href="#" class="btn btn-success ml-4">Approve</a>
            </div>
 
        </div>
    </div>
  </div> 
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'

export default {
  name: 'approval',
  components: {
      NavbarWeb
  }
}
</script>

<style scoped>
.space{
    height: 30px;
}

.list-group{
    width: 100%;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}
</style>