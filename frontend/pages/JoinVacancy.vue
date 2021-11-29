<template>
<div class="createVacancy">
  <navbar-web />
  <div class = "pt-4">
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Join Vacancy
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-group">
                    <label for="inputAddress">Company Name</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Company Type</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Job Description</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Number of Available Workforces</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Estimated Service Price</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Specifications / Requirements</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
            </form>
            
            <div class="space"></div>
            <div class="space"></div>
            <div class="d-flex" style="max-width: fit-content;">
                <h3>Documents</h3>
                <span class="ml-4"><a href="#" class="btn btn-primary">Upload</a></span>
            </div>

            <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 mb-2">
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Proposal</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            
            <div class="space"></div>
            <a href="#" class="btn btn-success center-btn">Join</a>

        </div>
    </div>
  </div>  
</div>  
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'

export default {
  name: 'JoinVacancy',
  components:{
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