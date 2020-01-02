<template>
<div> 
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">{{ ourinfo.about }}</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Contact</h6>
                <ul class="footer-links">
                    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> +212 {{ ourinfo.telephone }}</a></li>
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> {{ ourinfo.email }}</a></li>
                    <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ ourinfo.address }}</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                  <li><router-link to="/home">HOME</router-link></li>
                  <li><router-link to="/all-cars">ALL CARS</router-link></li>
                  <li><router-link to="/who-we-are">WHO WE ARE</router-link></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2019All by 
         <a href="#">Chaouni UAR05</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a target="_blank" class="facebook" :href="ourinfo.url_facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a target="_blank" class="twitter" :href="ourinfo.url_facebook"><i class="fa fa-twitter"></i></a></li>
              <li><a target="_blank" class="dribbble" :href="ourinfo.url_facebook"><i class="fa fa-dribbble"></i></a></li>
              <li><a target="_blank" class="linkedin" :href="ourinfo.url_facebook"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
    </div>
</footer>
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
/* start footer */
    .site-footer
{
  background-color: #00ffdf;
  padding:45px 0 20px;
  font-size:15px;
  line-height:24px;
  color:#737373;
}
.site-footer hr
{
  border-top-color:#bbb;
  opacity:0.5
}
.site-footer hr.small
{
  margin:20px 0
}
.site-footer h6
{
  color:#fff;
  font-size:16px;
  text-transform:uppercase;
  margin-top:5px;
  letter-spacing:2px
}
.site-footer a
{
  color:#737373;
}
.site-footer a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links
{
  padding-left:0;
  list-style:none
}
.footer-links li
{
  display:block
}
.footer-links a
{
  color:#737373
}
.footer-links a:active,.footer-links a:focus,.footer-links a:hover
{
  color:#3366cc;
  text-decoration:none;
}
.footer-links.inline li
{
  display:inline-block
}
.site-footer .social-icons
{
  text-align:right
}
.site-footer .social-icons a
{
  width:40px;
  height:40px;
  line-height:40px;
  margin-left:6px;
  margin-right:0;
  border-radius:100%;
  background-color:#33353d
}
.copyright-text
{
  margin:0
}
@media (max-width:991px)
{
  .site-footer [class^=col-]
  {
    margin-bottom:30px
  }
}
@media (max-width:767px)
{
  .site-footer
  {
    padding-bottom:0
  }
  .site-footer .copyright-text,.site-footer .social-icons
  {
    text-align:center
  }
}
.social-icons
{
  padding-left:0;
  margin-bottom:0;
  list-style:none
}
.social-icons li
{
  display:inline-block;
  margin-bottom:4px
}
.social-icons li.title
{
  margin-right:15px;
  text-transform:uppercase;
  color:#96a2b2;
  font-weight:700;
  font-size:13px
}
.social-icons a{
  background-color:#eceeef;
  color:#818a91;
  font-size:16px;
  display:inline-block;
  line-height:44px;
  width:44px;
  height:44px;
  text-align:center;
  margin-right:8px;
  border-radius:100%;
  -webkit-transition:all .2s linear;
  -o-transition:all .2s linear;
  transition:all .2s linear
}
.social-icons a:active,.social-icons a:focus,.social-icons a:hover
{
  color:#fff;
  background-color:#29aafe
}
.social-icons.size-sm a
{
  line-height:34px;
  height:34px;
  width:34px;
  font-size:14px
}
.social-icons a.facebook
{
  background-color:#007bff;
  border: 1px solid #797979;
  color: white;
  box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgb(0, 0, 0);
}
.social-icons a.twitter
{
  background-color:#00aced;
  border: 1px solid #797979;
  color: white;
  box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgb(0, 0, 0);
}
.social-icons a.linkedin
{
  background-color:#007bb6;
  border: 1px solid #797979;
  color: white;
  box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgb(0, 0, 0);
}
.social-icons a.dribbble
{
  background-color:#ea4c89;
  border: 1px solid #797979;
  color: white;
  box-shadow: 0 4px 8px 0 rgb(0, 0, 0), 0 6px 20px 0 rgb(0, 0, 0);
}
@media (max-width:767px)
{
  .social-icons li.title
  {
    display:block;
    margin-right:0;
    font-weight:600
  }
}
    /* end footer */
     /* start footer */
      .site-footer h6 {
    color: #000;
    font-size: 21px;
}
.site-footer .text-justify {
    color: black;
}
.site-footer .footer-links a {
    color: #000000;
}
.site-footer .copyright-text {
    margin: 0;
    color: black;
}
.site-footer a {
    color: black;
}
      /* end footer */
</style>