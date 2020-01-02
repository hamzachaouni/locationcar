<template>
  <section class="content">
    <div class="row">
      <div class="col-md-7">
        <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times" aria-hidden="true"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 30%">
                          Full name
                      </th>
                      <th style="width: 28%">
                          Email
                      </th>
                      <th>
                          Image
                      </th>
                      <th style="width: 53%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="user in users">
                      <td>
                          {{ user.id }}
                      </td>
                      <td>
                          <a>
                              {{ user.name }}
                          </a>
                          <br>
                          <small>
                              Created {{ user.created_at }}
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  {{ user.email }}
                              </li>
                          </ul>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar img-user" :src="'/images/'+user.photo" height="40px" width="40px">
                              </li>
                          </ul>
                      </td>
                      <td class="project-actions text-right">
                          <button type="button" class="btn btn-info btn-sm" @click="edituser(user.id)">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </i>
                              Edit
                          </button>
                          <button type="button" class="btn btn-danger btn-sm" @click="onDelete(user.id)">
                              <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </i>
                              Delete
                          </button>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div>
      <!-- start add user-->
      <div v-if="addUser == true" class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>
            </div>
            <form @submit.prevent="createuser">
              <!--<form @submit="createuser" enctype="multipart/form-data">-->
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Full Name</label>
                <input name="name" v-model="user.name" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.name.required">Last Name is required</div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" v-model="user.email" type="email" id="email" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.email.required">Last Email is required</div>
                <div style="color: red" v-if="submitted && !$v.user.email.email">Last Email is Not Email</div>
              </div>
              <div class="form-group">
                    <label>Role</label>
                    <select name="role" v-model="user.role" class="form-control">
                      <option :value="roleAdmin">Admin</option>
                      <option :value="roleUser">User</option>
                    </select>
                    <div style="color: red" v-if="submitted && !$v.user.role.required">Last Role is required</div>
                  </div>
              <div class="form-group">
                    <label for="exampleInputFigfhle">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input v-on:change="onImageChange" type="file" class="custom-file-input" id="exampleInputFigfhle">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    <img :src="avatar" class="img_uar_create" alt="Image User" width="300px" height="300px" style="margin-top: 15px">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" v-model="user.password" type="password" id="password" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.password.required">Last Password is required</div>
                <div style="color: red" v-if="submitted && !$v.user.password.minLength">Last Password Min 6</div>
              </div>
              <div class="form-group">
                <label for="password1">Confirmation Password</label>
                <input v-model="user.password_confirmation" type="password" id="password1" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.password_confirmation.required">Last Password Min 6</div>
                <div style="color: red" v-if="submitted && !$v.user.password_confirmation.sameAsPassword">Last Password Not Comme Password</div>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Create</button>
            </div>
          </form>
            <!-- /.card-body -->
          </div>
      </div>
      <!-- end add user-->
      <!-- start add user-->
      <div v-if="editUser == true" class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>
            </div>
            <form @submit.prevent="update" method="post">
               
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Full Name</label>
                <input name="name" v-model="user.name" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.name.required">Last Name is required</div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" v-model="user.email" type="email" id="email" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.email.required">Last Email is required</div>
                <div style="color: red" v-if="submitted && !$v.user.email.email">Last Email is Not Email</div>
              </div>
               <div class="form-group">
                    <label>Role</label>
                    <select name="role" v-model="user.role" class="form-control">
                      <option :value="roleAdmin">Admin</option>
                      <option :value="roleUser">User</option>
                    </select>
                    <div style="color: red" v-if="submitted && !$v.user.role.required">Last Role is required</div>
                  </div>
              <div class="form-group">
                    <label for="exampleInputFigfhle">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input v-on:change="onImageChange" type="file" class="custom-file-input" id="exampleInputFigfhle">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                    <img :src="avatar" alt="Image User" width="300px" height="300px" style="margin-top: 15px">
              </div>
              <div class="form-group">
                <label for="password">New Password</label>
                <input name="password" v-model="user.password" type="password" id="password" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.password.required">Last Password is required</div>
                <div style="color: red" v-if="submitted && !$v.user.password.minLength">Last Password Min 6</div>
              </div>
              <div class="form-group">
                <label for="password1">Confirmation New Password</label>
                <input name="password_confirmation" v-model="user.password_confirmation" type="password" id="password1" class="form-control">
                <div style="color: red" v-if="submitted && !$v.user.password_confirmation.required">Last Password Min 6</div>
                <div style="color: red" v-if="submitted && !$v.user.password_confirmation.sameAsPassword">Last Password Not Comme Password</div>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
          </form>
            <!-- /.card-body -->
          </div>
      </div>
      <!-- end add user-->
    </div>


    

  </section>  
</template>

<script>
  import { required , minLength, between, email, sameAs } from 'vuelidate/lib/validators';
  export default {  
    data () {
    return {
      // Create a new form instance
      errors:[],
      addUser: true,
      editUser: false,
      roleAdmin: 2,
      roleUser: 1,
      user: {
        id: '',
        email: '',
        name: '',
        role: 1,
        password: '',
        photo: '',
        password_confirmation: '',
      },
      submitted: false,
      users: [],
      search: '',
      avatar: null,
      name: '',
      success: '',
      avatar: '',
      image: ''
    }
  },
  validations: {
    user: {
        id: '',
        email: {
          required,
          email
        },
        name: {
          required 
        },
        role: {
          required 
        },
        password: { required, minLength: minLength(6) },
        password_confirmation: { required, sameAsPassword: sameAs('password') },
        photo: {
          required
        }
      },
  },
  methods: {
      onImageChange(e) {
                this.image = e.target.files[0];
                this.user.photo = e.target.files[0].name;
                // Reference to the DOM input element
            var input = e.target;
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
                // create a new FileReader to read this image and convert to base64 format
                var reader = new FileReader();
                // Define a callback function to run, when FileReader finishes its job
                reader.onload = (e) => {
                    // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
                    // Read image as base64 and set to imageData
                    this.avatar = e.target.result;
                }
                // Start the reader job - read file as a data url (base64 format)
                reader.readAsDataURL(input.files[0]);
            }},
    update(e) {
       this.submitted = true;
                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                e.preventDefault();
                let currentObj = this;
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('name', this.user.name);
                formData.append('email', this.user.email);
                formData.append('role', this.user.role);
                formData.append('password', this.user.password);
      
    
           axios.post(`http://localhost:8000/api/users/` + this.user.id, formData, config)
           .then(res => {

        this.addUser = true;
        this.editUser = false;
            const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})
Toast.fire({
  type: 'success',
  title: 'Is Update'
})
            this.submitted = false;
            this.avatar = ''; 
            this.user = {
              id: '',
        email: '',
        name: '',
        role: '',
        password: '',
            }
            $('#editUser').modal('hide');
            })
           .catch(err => console.error(err));    
        },
      edituser(id) {
        this.addUser = false;
        this.editUser = true;
            axios.get(`http://localhost:8000/api/users/` + id)
                .then(res => {
                    console.log(res.data.user);
                this.user = {
                        id: res.data.user.id,
                        email: res.data.user.email,
                        name: res.data.user.name,
                        role: res.data.user.role,
                        password: res.data.user.password,
                    }   
              });
        },
        createuser(e) {
      this.submitted = true;
                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }
                e.preventDefault();
                let currentObj = this;
 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('name', this.user.name);
                formData.append('email', this.user.email);
                formData.append('photo', this.user.photo);
                formData.append('role', this.user.role);
                formData.append('password', this.user.password);

  axios.post('http://localhost:8000/api/users', formData, config)
                .then(res => {
                  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

Toast.fire({
  type: 'success',
  title: 'User is Created'
})
                  this.submitted = false;
                  this.avatar = '';
                this.user = {
                  id: '',
        email: '',
        name: '',
        role: 1,
        password: '',
        password_confirmation: ''
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


      },
      getusers() {
        axios.get(`http://localhost:8000/api/users`)
             .then(res => {
                 this.users = res.data.users;
                 console.log(res.data.users);                 
              })  
             .catch(err => {
              console.error(err)
            })
              
      },
      onDelete(id) {

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    axios.delete(`http://localhost:8000/api/users/`+ id)
            .then(res => {
              console.log("delete");
             })  
            .catch(err => console.error(err)); 
    Swal.fire(
      'Deleted!',
      'Your User has been deleted.',
      'success'
    )
  }
})
                
    }
    },
    created() {
    this.getusers();
    setInterval(() => this.getusers(), 3000);
    },
    computed: {
      filteredUsers: function() {
        return this.users.filter(
          (user) => {
            return user.name.match(this.search)
          }
        )
      }
    }
}

    
</script>
<style>
  .form-group .error_input {
    border: 1px solid red;
  }
  .form-group .error_label {
    color: red;
  }
  .img_uar_create {
    width: 265px;
    background-color: white;
    border: 1px solid #DDD;
    padding: 5px;
  }

  .img-user {
    border-radius: 50%;
  }
</style>
