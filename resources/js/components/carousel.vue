<template>
<div> 

      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img width="100%" height="500px" :src="ourinfo.slider_img_i" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img width="100%" height="500px" :src="ourinfo.slider_img_ii" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img width="100%" height="500px" :src="ourinfo.slider_img_iii" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      
</div>
</template>

<script>
    export default {
      components : {
      },
        data() {
            return {
              ourinfo: []
            }
        },
        methods: {
       getOurinformation() {
           axios.get(`http://localhost:8000/api/info/1`)
             .then(res => {
                 this.ourinfo = res.data.data[0];
                 console.log(res.data);
              })  
             .catch(err => console.error(err))
       }
        },
   created() {
       this.getOurinformation();
   }
    }
</script>