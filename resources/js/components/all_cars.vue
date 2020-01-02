<template>
  <div>
    <sid-ebar></sid-ebar>
      <nav-bar></nav-bar>
      <caro-usel></caro-usel>
    <div class="container">
        <div class="row justif-content-center">
            <div class="col-md-12 text-center">
                <div class="text-top">
                <h1>All Cars</h1>
                <hr>
            </div>
            </div>

            <div class="col-md-4" v-for="car in cars">

                <figure class="snip1104 red">
  <img :src="'/images/'+car.photo" alt="sample33" />
  <figcaption>
    <h2>{{ car.name }}</h2>
  </figcaption>
  <router-link v-bind:to="'/car/' + car.slug"></router-link>
</figure>
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
              cars: [],
            }
        },
        methods: {
          getCars() {
           axios.get(`http://localhost:8000/api/cars`)
             .then(res => {
                 this.cars = res.data.data;
                 console.log(res.data.data);
              })  
             .catch(err => console.error(err))
       }
        },
   created() {
       this.getCars();

   }
    }
</script>

<style>

.text-top {
    border-bottom: 1px solid #c1c1c1;
}
/* start card */
/* Included color classes.. 
    .red 
    .blue 
    .yellow 
*/

@import url(https://fonts.googleapis.com/css?family=Raleway:400,800);
figure.snip1104 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 220px;
  max-width: 310px;
  max-height: 220px;
  width: 100%;
  background: #000000;
  color: #ffffff;
  text-align: center;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}

figure.snip1104 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all 0.4s ease-in-out;
  transition: all 0.4s ease-in-out;
}

figure.snip1104 img {
  max-width: 100%;
  position: relative;
  opacity: 0.4;
}

figure.snip1104 figcaption {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

figure.snip1104 h2 {
  position: absolute;
  left: 40px;
  right: 40px;
  display: inline-block;
  background: #000000;
  -webkit-transform: skew(-10deg) rotate(-10deg) translate(0, -50%);
  transform: skew(-10deg) rotate(-10deg) translate(0, -50%);
  padding: 12px 5px;
  margin: 0;
  top: 50%;
  text-transform: uppercase;
  font-weight: 400;
}

figure.snip1104 h2 span {
  font-weight: 800;
}

figure.snip1104:before {
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  content: '';
  background: #ffffff;
  position: absolute;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
  -webkit-transform: rotate(110deg) translateY(-50%);
  transform: rotate(110deg) translateY(-50%);
}

figure.snip1104 a {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  position: absolute;
  z-index: 1;
}

figure.snip1104.blue {
  background: #123851;
}

figure.snip1104.blue h2 {
  background: #0a212f;
}

figure.snip1104.red {
  background: black;
}

figure.snip1104.red h2 {
  background: #00ffdf;
  font-size: 21px;
}

figure.snip1104.yellow {
  background: #7f5006;
}

figure.snip1104.yellow h2 {
  background: #583804;
}

figure.snip1104:hover img,
figure.snip1104.hover img {
  opacity: 1;
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

figure.snip1104:hover h2,
figure.snip1104.hover h2 {
  -webkit-transform: skew(-10deg) rotate(-10deg) translate(-150%, -50%);
  transform: skew(-10deg) rotate(-10deg) translate(-150%, -50%);
}

figure.snip1104:hover:before,
figure.snip1104.hover:before {
  -webkit-transform: rotate(110deg) translateY(-150%);
  transform: rotate(110deg) translateY(-150%);
}


/* Demo purposes only */
html {
  height: 100%;
}
body {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-flow: wrap;
  margin: 0;
  height: 100%;
}
/* end card */
</style>
