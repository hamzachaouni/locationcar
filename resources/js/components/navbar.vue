<template>
<div> 
  <!-- start navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light nav-bar">
        <div class="container">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <router-link to="/home" class="nav-link">HOME</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/cars-all" class="nav-link" href="#">ALL CARS</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/who-we-are" class="nav-link" href="#">WHO WE ARE</router-link>
      </li>
      <li class="nav-item">
        <router-link to="/contact" class="nav-link" href="#">CONTACT</router-link>
      </li>
    </ul>
  </div>
  </div>
</nav>
      <!-- end navbar -->
</div>
</template>

<script>
    export default {
      components : {
      },
        data() {
            return {
              ourinfos: []
            }
        },
        methods: {
       getOurinformation() {
           axios.get(`http://localhost:8000/api/info`)
             .then(res => {
                 this.ourinfos = res.data.data;
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
<style>
      /* start navbar */
      .nav-bar {
    padding: 30px;
    background-color: #00ffdf!important;
}
.nav-bar .navbar-brand {
    color: black;
}    
.nav-bar .navbar-nav .nav-link {
    color: black;
}
.nav-bar .ml-auto .nav-link {
    padding-right: .5rem;
    padding-left: 4.5rem;
}
      /* end navabr */
</style>