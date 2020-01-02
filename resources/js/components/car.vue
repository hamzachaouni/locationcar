<template>
  <div>
    <sid-ebar></sid-ebar>
      <nav-bar></nav-bar>
      <caro-usel></caro-usel>
    <div class="container">
        <div class="row justify-content-center car">
            <div class="col-md-8 left">
              <h2 v-if="car.date_entry !== null">
                 <i class="fa fa-eye" aria-hidden="true"></i><sapn style="color:red">  will be available : {{ car.date_entry }}</sapn></h2>
                <img :src="'/images/'+car.photo" width="100%" height="450px">
                <div class="row info">
                    <div class="col-md-6 text-left">
                        <h2>{{ car.name }}</h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <h5>{{ car.price }}DH<br><span>Day</span></h5>
                    </div>
                </div>
                <div class="row justify-content-left information">
                    <div class="col-md-4">
                        <h5>{{ car.places }} Places</h5>
                        <h5>{{ car.suitcase }} Suitcase</h5>
                        <h5>{{ car.portes }} Portes</h5>
                        <h5>{{ car.portes }} Sacs</h5>
                    </div>
                    <div class="col-md-4">
                        <h5>
                          <i v-if="car.automatique == 1 || car.automatique == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.automatique == null || car.automatique == 0" class="fa fa-times" aria-hidden="true"></i>
                        automatique</h5>
                        <h5>
                          <i v-if="car.audio_input == 1 || car.audio_input == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.audio_input == null || car.audio_input == 0" class="fa fa-times" aria-hidden="true"></i>
                        Audio input</h5>
                        <h5>
                          <i v-if="car.bluetouth == 1 || car.bluetouth == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.bluetouth == null || car.bluetouth == 0" class="fa fa-times" aria-hidden="true"></i>
                        Bluetouth</h5>
                        <h5>
                         <i v-if="car.heatedseats == 1 || car.heatedseats == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.heatedseats == null || car.heatedseats == 0" class="fa fa-times" aria-hidden="true"></i>
                        Heated seats</h5>
                    </div>
                    <div class="col-md-4">
                        <h5>
                          <i v-if="car.air_conditioner == 1 || car.air_conditioner == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.air_conditioner == null || car.air_conditioner == 0"  class="fa fa-times" aria-hidden="true"></i> 
                        Air-conditioner</h5>
                        <h5>
                          <i v-if="car.allwheeldrive == 1 || car.allwheeldrive == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.allwheeldrive == null || car.allwheeldrive == 0" class="fa fa-times" aria-hidden="true"></i>  
                        All Wheel drive</h5>
                        <h5>
                          <i v-if="car.usb_input == 1 || car.usb_input == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.usb_input == null || car.usb_input == 0" class="fa fa-times" aria-hidden="true"></i>  
                        USB input</h5>
                        <h5>
                           <i v-if="car.fm_radio == 1 || car.fm_radio == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.fm_radio == null || car.fm_radio == 0" class="fa fa-times" aria-hidden="true"></i>   
                        FM Radio</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 right">
                <div class="contact">
                    <h4>Contact</h4>
                    <hr>
                    <h5><i class="fa fa-volume-control-phone" aria-hidden="true"></i> +212 {{ ourinfo.telephone }}</h5>
                    <h5><i class="fa fa-clock-o" aria-hidden="true"></i> 9:00 - 18:00</h5>
                </div>
                <div class="gps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d52959.770922750286!2d-6.9106313!3d33.94149635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1566156365367!5m2!1sen!2sma" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
                <div class="box">

    
       <div v-for="car in cars" class="card">
         <div class="imgBx">
            <img :src="'/images/'+car.photo" alt="images">
         </div>
         <div class="details">
            <h2>SomeOne Famous<br><span><a href="#">View</a></span></h2>
          </div>
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
      data() {
      return {   
        car: [],
        cars: [],
        ourinfo: []
        //search: ''
      }
    },
    methods: {
      getcar() {
        axios.get('http://localhost:8000/api/cars/' + this.$route.params.slug)
            .then(res => {
                this.car = res.data.data[0];
                  console.log(res.data.data[0].date_entry);
              })
             .catch(err => console.error(err))
      },
      getcars() {
        axios.get(`http://localhost:8000/api/cars`)
            .then(res => {
                this.cars = res.data.data;   
                console.log(res.data.data);
              })
             .catch(err => console.error(err))
      },
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
      this.getcar();
      this.getcars();
      this.getOurinformation();
      //setInterval(() => this.getcars(), 3000);

    },
      components : {
        'foo-ter': footer,
        'nav-bar': navbar,
        'sid-ebar': sidebar,
        'caro-usel': carousel 
      },
        mounted() {
            console.log('Component mounted.')
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
    /* start car */
    .car {
    margin-top: 20px;
}
    .car .left img {
    vertical-align: middle;
    border-style: none;
    border-radius: 2%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
    .car .left span {
    font-size: 17px;
    color: #04dbc0;
}
    .car .right .contact {
    border: 1px solid #d4d1d1;
    padding: 10px 38px;
    border-radius: 6px;
}
.car .right .gps {
    border: 1px solid #d4d1d1;
    padding: 5px 5px;
    border-radius: 6px;
    margin-top: 10px;
}
.car .info {
    margin: 26px 0;
}
.car .information {
    margin: 0;
}
    /* end car */
</style>
