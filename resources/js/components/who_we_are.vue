<template>
    <div>
        <sid-ebar></sid-ebar>
      <nav-bar></nav-bar>
      <caro-usel></caro-usel>
    <div class="who-we-are">
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 left">
                <div class="title">
                <h3><span>About Us</span></h3>
                </div>
                <div class="content">

                    <p><span>WHO<br>WE ARE</span><br>{{ ourinfo.about }} </p>
                </div>
            </div>

            <div class="col-md-5 right">
                <div class="title">
                <h3><span>Contact</span></h3>
                </div>
                <div class="content">
        
                <div class="row">
                    <div class="col-md-6">
                        <!-- Facebook -->
                <a class="btn_a btn_a_large facebook" href="#">
                    <div class="btn_overlay"></div>
                    <span>
                        <i class="fa fa-facebook"></i>
                        <span>1500+ Followers</span>
                        <p>Facebook</p>
                    </span>
                </a>
                
                <!-- Twitter -->
                <a class="btn_a btn_a_large twitter" href="#">
                    <span>
                        <i class="fa fa-twitter"></i>
                        <span>2500+ Followers</span>
                        <p>Twitter</p>
                    </span>
                </a>
                    </div>
                    <div class="col-md-6">
                        <!-- Google Plus -->
                <a class="btn_a btn_a_large google-plus" href="#">
                    <span>
                        <i class="fa fa-google-plus"></i>
                        <span>9.5M Followers</span>
                        <p>Google+</p>
                    </span>
                </a>
                
                <!-- Pinterest -->
                <a class="btn_a btn_a_large pinterest" href="#">
                    <span>
                        <i class="fa fa-pinterest"></i>
                        <span>2,100 Followers</span>
                        <p>Pinterest</p>
                    </span>
                </a>
                    </div>
                    <div class="col-md-6">
                        
                <!-- Youtube -->
                <a class="btn_a btn_a_large youtube" href="#">
                    <span>
                        <i class="fa fa-youtube"></i>
                        <span>5000 Subscribe</span>
                        <p>Youtube</p>
                    </span>
                </a>    

                
                    </div>
                    <div class="col-md-6">
                        <!-- Instagram -->
                <a class="btn_a btn_a_large instagram" href="#">
                    <span>
                        <i class="fa fa-instagram"></i>
                        <span>3,524 Followers</span>
                        <p>Instagram</p>
                    </span>
                </a>   
                    </div>
                </div>
                
                
             
        
        </div>
            </div>
            
            </div>

        
        </div>
        <div class="row">
        <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d52959.770922750286!2d-6.9106313!3d33.94149635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1566156365367!5m2!1sen!2sma" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
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
   },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
/* start left */
.row {
    margin: 69px 0px 0px;
}
.who-we-are .left .content p span {
    font-size: 39px;
    color: black;
}
.who-we-are .left .content p {
    padding: 24px 75px;
    border-left: 4px solid black;
    margin-top: 28px;
}
.who-we-are .left .title h3 span {
    background: #00ffdf;
    padding: 4px 31px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    color: black;
    border-radius: 3%;
}
/* end left */
/* start right */
.who-we-are .right .title h3 span {
    background: #00ffdf;
    padding: 4px 31px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    color: black;
    border-radius: 3%;
}
.content {
    max-width: 500px;
    margin: 0 auto 0;
}
/*
* Social Media Button
*/
.btn_a {
width:210px;
overflow:hidden;
display:inline-block;
white-space:nowrap;
vertical-align:baseline;
cursor:pointer;
background:#222;
position:relative;
-moz-transition:all .4s ease;
-webkit-transition:all .4s ease;
transition:all .4s ease;
-moz-box-shadow:0 0 1px #fff inset;
-webkit-box-shadow:0 0 1px #fff inset;
box-shadow:0 0 1px #fff inset;
margin:0 10px 10px 0;
}

.btn_a:hover {
-webkit-opacity:0.8;
-moz-opacity:0.8;
opacity:0.8;
}

.btn_a span {
display:inline-block;
margin:15px;
}

.btn_a i {
width:30px;
height:30px;
background:rgba(255,255,0,0.5);
line-height:30px;
text-align:center;
border-radius:50%;
position:relative;
top:5px;
margin:0 10px 20px 0;
}

.btn_a span:before {
width:5px;
position:absolute;
color:red;
content:"";
border:6px solid #eee;
right:5px;
top:0;
}

.btn_a span:after {
content:"";
border-bottom:8px solid transparent;
border-left:8px solid #eee;
border-right:9px solid #eee;
position:absolute;
top:12px;
right:5px;
}

.btn_a span > span:before,.btn_a span > span:after {
content:none;
}

.btn_a span > span {
font-family:verdana;
font-size:13px;
overflow:hidden;
color:#aaa;
position:relative;
top:-3px;
margin:0;
}

.btn_a p {
font-size:22px;
font-family:verdana;
margin:-30px 0 0 42px;
}

.btn_a.facebook {
background:#3b5998;
}

.btn_a.facebook i {
background:#fff;
color:#3b5998;
}

.btn_a.twitter {
background:#00aced;
}

.btn_a.twitter i {
background:#fff;
color:#00aced;
}

.btn_a.google-plus {
background:#dd4b39;
}

.btn_a.google-plus i {
background:#fff;
color:#dd4b39;
}

.btn_a.pinterest {
background:#cb2027;
}

.btn_a.pinterest i {
background:#fff;
color:#cb2027;
}

.btn_a.instagram {
background:#517fa4;
}

.btn_a.instagram i {
background:#fff;
color:#517fa4;
}

.btn_a.youtube {
background:#b00;
}

.btn_a.youtube i {
background:#fff;
color:#b00;
}

.btn_a.facebook span > span,.btn_a.twitter span > span,.btn_a.google-plus span > span,.btn_a.pinterest span > span,.btn_a.instagram span > span,.btn_a.youtube span > span {
color:#fff;
}
/* end right */
</style>
