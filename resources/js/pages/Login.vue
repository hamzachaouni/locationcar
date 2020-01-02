<template>
    <!--<div class="container">
        <div class="card card-default">
            <div class="card-header">Connexion</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Erreur, impossible de se connecter avec ces identifiants.</p>
                </div>
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>
                    <button type="submit" class="btn btn-default">Connexion</button>
                </form>
            </div>
        </div>
    </div>-->
    <div id="login-page">
  <div class="login">
    <h2 class="login-title">Login</h2>
    <form class="form-login" autocomplete="off" @submit.prevent="login" method="post">
      <label for="email">E-mail</label>
      <div class="input-email">
        <input type="email" name="email" placeholder="type your e-mail" v-model="email" required>
      </div>
      <label for="password">Password</label>
      <div class="input-password">
        <input type="password" name="password" placeholder="type your password" v-model="password" required>
      </div>
      <input type="submit" value="Login">
    </form>
      
  </div>
  <div class="background">
    <h1>Le Lorem Ipsum est simplement du faux texte employé dans la composition </h1>
    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en pageLe Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page</p>
    
  </div>
</div>
</template>
<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.cars' : 'cars'
            this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>
<style>

* {
  box-sizing: border-box;
}
body {
  margin: 0;
  font-family: sans-serif;
}
a {
  color: #666;
  font-size: 14px;
  display: block;
}
.logo {
  width: 190px;
  height: 60px;
  background: #DDD;
}
.login-title {
  flex-basis: 100%;
}
#login-page {
  display: flex;
}
.login {
  width: 30%;
  height: 100vh;
  background: #FFF;
  padding: 50px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  align-content: center;
  text-align: center;
}
.login a {
  margin-top: 25px;
}
.form-login label {
  text-align: left;
  font-size: 13px;
  margin-top: 5px;
  display: block;
  color: #666;
}
.input-email,
.input-password {
  width: 100%;
  background: #DDD;
  border-radius: 4px;
  margin: 4px 0;
  padding: 10px;
  float: left;
  display: flex;
}
.icon {
  padding: 4px;
  color: #666;
  min-width: 30px;
  text-align: center;
}
input[type="email"],
input[type="password"] {
  width: 100%;
  border: 0;
  background: none;
  font-size: 16px;
  padding: 4px 0;
  outline: none;
}
input[type="submit"] {
  width: 100%;
  border: 0;
  border-radius: 25px;
  padding: 14px;
  background: #008552;
  color: #FFF;
  display: inline-block;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
}

.background {
  width: 70%;
  padding: 40px;
  height: 100vh;
  background: linear-gradient(60deg, rgba(158, 189, 19, 0.5), rgba(0, 133, 82, 0.7)), url('https://newevolutiondesigns.com/images/freebies/car-wallpaper-4.jpg') center no-repeat;
  background-size: cover;
  display: flex;
  flex-wrap: wrap;
  align-items: flex-end;
  justify-content: flex-end;
  align-content: center;
  flex-direction: row;
}
.background h1 {
  max-width: 420px;
  color: #FFF;
  text-align: right;
  padding: 0;
  margin: 0;
}
.background p {
  max-width: 650px;
  color: #DDD;
  font-size: 15px;
  text-align: right;
  padding: 0;
  margin: 15px 0 0 0;
}
.madeby {
  position: absolute;
  bottom: 30px;
  right: 40px;
}
.madeby p {
  font-weight: bold;
  color: #9EBD13;
}
.madeby a {
  color: #222;
  text-decoration: none;
}

</style>