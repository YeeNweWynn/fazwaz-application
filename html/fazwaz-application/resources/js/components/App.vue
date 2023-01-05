<template>
  <div class="container mx-auto mt-4">
    <div class="row">
        <div class="col-lg-12">
          <div class="search-result-box card-box">
              <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="pt-3 pb-4">
                            <form v-on:submit.prevent="searchProperty()">	
                              <div class="input-group">
                                  <input type="text" id="" name="" class="form-control" value="Search here">
                                  <div class="input-group-append">
                                      <button type="button" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search mr-1"></i> Search</button>
                                  </div>
                              </div>
                             </form>
                            <!-- <div class="mt-4 text-center">
                              <h4>Search Results</h4>
                            </div> -->
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
                <a href="#" class="btn mr-2"><i class="fas fa-link"></i> View Details</a>
              </div>
            </div>
          </div>

      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
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
        SearchName:'',
      }
    },
   methods:{ 
      getProperties(){  
          axios.get('http://localhost/api/list/').then (response=>{
            this.properties = response.data;                  
          });
      },
      searchProperty(page){
        var per=10;
        this.$router.push({ name: 'global_search', query: { name:this.SearchName,page:1,per:per}});
      }
    }
   
  }
</script>
