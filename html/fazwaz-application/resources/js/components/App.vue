<template>
  <div class="container mx-auto mt-4">
    <div class="row">
        <div class="col-lg-12">
          <div class="search-result-box card-box">
              <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="pt-3 pb-4">
                              <div class="input-group">
                                  <input type="text" id="" name="" class="form-control" v-model="keywords">
                                  <div class="input-group-append">
                                      <button type="button" class="btn waves-effect waves-light btn-primary" @click="getProperties()"><i class="fa fa-search mr-1"></i> Search</button>
                                  </div>
                              </div>
                        </div>
                    </div>
              </div>
          </div>
        </div>
        <div class="col-md-4" v-for="property in properties">
          <div class="card" style="width: 18rem;">
            <img src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{property.title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{property.price}} {{property.currency}}</h6>
              <p class="card-text text-muted">{{property.street}}, {{property.province}}, {{property.country}}</p>
              <a href="#" class="btn mr-2 btn-primary custom-btn"><i class="fas fa-link"></i> View Details</a>
            </div>
          </div>
        </div>
    </div>
    <pagination v-model="page" :records="20" :per-page="10" @paginate="getProperties"/>
  </div>  
</template>
<script>
  export default{
    mounted(){
      console.log('App connected');
    },
    data:function(){
      return {
        properties:[],
        index:this.getProperties(),  
        keywords:'',
        page: 1,
      }
    },
    methods:{ 
      getProperties(){ 
        axios.get('http://localhost/api/list?search='+this.keywords)
                .then(response => this.properties = response.data)
                .catch(error => {});
      },
    }
  }
</script>
