<template>
    <div>
        <sid-ebar></sid-ebar>
      <nav-bar></nav-bar>
      <caro-usel></caro-usel>
      <div class="container">
<div class="row contact">
    
    <div class="col-md-6">
       <h2>Connect With us</h2>
       <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre</p>
    </div>
    <div class="col-md-6">
        <form @submit.prevent="createmsg">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" v-model="msg.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <div style="color: red" v-if="submitted && !$v.msg.email.required">Last Email is required</div>
                <div style="color: red" v-if="submitted && !$v.msg.email.email">Last Email is Not Email</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea name="message" v-model="msg.message" class="form-control" id="exampleInputPassword1" placeholder="Message ..."></textarea>
    <div style="color: red" v-if="submitted && !$v.msg.email.required">Last Message is required</div>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
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
    import { required , minLength, between, email, sameAs } from 'vuelidate/lib/validators';
    export default {
      components : {
        'foo-ter': footer,
        'nav-bar': navbar,
        'sid-ebar': sidebar,
        'caro-usel': carousel 
      },
        data() {
            return {
                submitted: false,
              msg: {
                message: '',
                email: ''
              }
            }
        },
        validations: {
    msg: {
        email: {
          required,
          email
        },
        message: {
          required 
        }
      },
  },
        methods: {

            createmsg() {
                console.log('gggg');
      this.submitted = true;

                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                //alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.user));

  axios.post('http://localhost:8000/api/messages', this.msg)
                .then(res => {
    
                  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

Toast.fire({
  type: 'success',
  title: 'Msg is Send'
})
                  this.submitted = false;
                this.msg = {
                  
        email: '',
        message: ''
                }
                })
                .catch(err => {
                  Swal.fire({
  position: 'top-end',
  type: 'error',
  title: 'Error',
  showConfirmButton: false,
  timer: 2500
})
                });


      }
          
        },
   created() {
       
   },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
.contact {
    padding-bottom: 40px;
}
</style>
