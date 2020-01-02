<template>
    <div>
      <sid-ebar></sid-ebar>
      <nav-bar></nav-bar>
      <caro-usel></caro-usel>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center text-top">
                <h2>Choose The Car That Suits You Best</h2>
            </div>
        </div>
    <div class="row justify-content-center">
                <div class="box">
      <div class="card" v-for="cartop in carstop">
        <div class="imgBx">
            <img :src="'/images/'+cartop.photo" alt="images">
        </div>
        <div class="details">
            <h2>{{ cartop.name }}<br><span><router-link v-bind:to="'/car/' + cartop.slug">View</router-link></span></h2>
        </div>
      </div>
  </div>
            
        </div>
        
    </div>

    <div class="bd-example slider-bottom">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img height="500px" src="https://i.pinimg.com/originals/4d/97/9b/4d979b93ad9cd19101cc3de7005c6020.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>About</h5>
          <p>{{ ourinfo.about }}</p>
          <h3>+212 {{ ourinfo.telephone }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center">
                <div class="box">
      <div class="card" v-for="carbottom in carsbottom">
        <div class="imgBx">
            <img :src="'/images/'+carbottom.photo" alt="images">
        </div>
        <div class="details">
            <h2>{{ carbottom.name }}<br><span><router-link v-bind:to="'/car/' + carbottom.slug">View</router-link></span></h2>
        </div>
      </div>
  </div>
            
        </div>
      <foo-ter></foo-ter>
</div>
</template>

<script>
    import footer from './footer'
    import navbar from './navbar'
    import sidebar from './sidebar'
    import carousel from './carousel'
    export default {
      components : {
        'foo-ter': footer,
        'nav-bar': navbar,
        'sid-ebar': sidebar,
        'caro-usel': carousel 
      },
        data() {
            return {
              carstop: [],
              carsbottom: [],
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
       },
          getCarsTop() {
           axios.get(`http://localhost:8000/api/cars_top`)
             .then(res => {
                 this.carstop = res.data.data;
                 console.log(res.data.data);
              })  
             .catch(err => console.error(err))
       },
       getCarsBottom() {
           axios.get(`http://localhost:8000/api/cars_bottom`)
             .then(res => {
                 this.carsbottom = res.data.data;
                 console.log(res.data.data);
              })  
             .catch(err => console.error(err))
       }
        },
   created() {
       this.getCarsTop();
       this.getCarsBottom();
       this.getOurinformation();
   }
    }
</script>

<style>
/* start card */
.box{
    width: 1200px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap: 15px;
    margin: 60px auto;
  }
  a:hover {
  text-decoration: none;
}
  .card{
    position: relative;
    width: 372px;
    height: 297px;
    background: #fff;
    margin: 0 auto;
    border-radius: 4px;
    box-shadow:0 2px 10px rgba(0,0,0,.2);
  }
  .card:before,
  .card:after
  {
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 4px;
    background: #fff;
    transition: 0.5s;
    z-index:-1;
  }
  .card:hover:before{
  transform: rotate(20deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card:hover:after{
  transform: rotate(10deg);
  box-shadow: 0 2px 20px rgba(0,0,0,.2);
  }
  .card .imgBx{
  position: absolute;
  top: 10px;
  left: 10px;
  bottom: 10px;
  right: 10px;
  background: #222;
  transition: 0.5s;
  z-index: 1;
  }
  
  .card:hover .imgBx
  {
    bottom: 80px;
  }

  .card .imgBx img{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
  }

  .card .details{
      position: absolute;
      left: 10px;
      right: 10px;
      bottom: 10px;
      height: 60px;
      text-align: center;
  }

  .card .details h2{
   margin: 0;
   padding: 0;
   font-weight: 600;
   font-size: 20px;
   color: #777;
   text-transform: uppercase;
  } 

  .card .details h2 span{
  font-weight: 500;
  font-size: 16px;
  color: #f38695;
  display: block;
  margin-top: 5px;
   } 
/* end card */
/* start text top */
.text-top h2 {
    margin-top: 39px;
}
/* end text top */
/* start slider bottom */
.slider-bottom .carousel-caption {
    bottom: 30%;
}
.slider-bottom .carousel-caption h5 {
    font-size: 4.25rem;
}
.slider-bottom .carousel-caption p {
    font-size: 20px;
}
/* end slider bottom */
</style>
