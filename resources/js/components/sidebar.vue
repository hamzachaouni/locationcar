<template>
<div> 
<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light bar-top">
        <div class="container-fluid">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ ourinfo.address }}
          <!-- test -->
      <!-- test -->
    </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> +212 {{ ourinfo.telephone }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ ourinfo.start_work_from }} - {{ ourinfo.end_work_to }}</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" target="_blank" v-bind:href="ourinfo.url_facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" v-bind:href="ourinfo.url_facebook"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" v-bind:href="ourinfo.url_facebook"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </li>
    </ul>
  </div>
  </div>
</nav>
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
<style>
.nav-link:active  {
  color: white;
}
      /* start bar */
    body {
      font-family: 'Concert One', cursive;
    }
    .bar-top {
    background-color: #000000!important;
      }
      .bar-top .navbar-brand {
    color: rgba(255, 255, 255, 0.9);
}    
.bar-top .navbar-nav .nav-link {
    color: rgba(255, 255, 255, 0.9);
}

.navbar-expand-lg .mr-auto .nav-link {
    padding-right: .5rem;
    padding-left: 7.5rem;
    color: white;
}
.navbar-expand-lg .mr-auto .nav-link i {
  color: #04dbc0;
}
.navbar-expand-lg .mr-auto .nav-link:hover {
  color: white;
}
.navbar-expand-lg .ml-auto .nav-link:hover {
  color: white;
}

    
      /* end bar */
</style>