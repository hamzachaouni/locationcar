<template>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" height="100px" :src="'/images/'+user.photo" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ user.name }}</h3>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Messages</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <ul v-for="message in messages" class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-danger">
                          {{ message.created_at }}
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope" aria-hidden="true"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"> {{ message.email }}</h3>

                          <div class="timeline-body">
                            {{ message.message }}
                          </div>
                          <div class="timeline-footer">
                            <button class="btn btn-danger btn-sm" @click="onDelete(message.id)">Delete</button>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="far fa-clock bg-gray"></i>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" @submit.prevent="updateUserAuth" method="post">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                        <div class="col-sm-10">
                          <input name="name" v-model="user.name" type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                          <input name="email" v-model="user.email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                    <label class="col-sm-2" for="exampleInputFile">Image</label>
                    <div class="input-group">
                        <div class="col-sm-10">
                      <div class="custom-file">
                        <input v-on:change="onImageChange" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                </div>
              </div>
                    <div class="form-group">
                <label for="password" class="col-sm-2"> New Password</label>
                <div class="col-sm-10">
                <input name="password" v-model="user.password" type="password" id="password" class="form-control">
            </div>
              </div>
              <div class="form-group">
                <label for="password1" class="col-sm-4">Confirmation Password</label>
                <div class="col-sm-10">
                <input type="password" id="password1" class="form-control">
            </div>
              </div>
                      
                     
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
      components : {

      },
        data() {
            return {
              idAuth: null,
              //image: [],             
              user: {
        id: '',
        email: '',
        name: '',
        password: '',
        photo: '',
        password_confirmation: '',
        image: ''
      },
      messages: []
            }
        },
        methods: {
          getUserAuth() {
           axios.get(`http://localhost:8000/api/auth/user`)
             .then(res => {
                 console.log(res.data.data); 
                 this.user = {
        id: '',
        email: res.data.data.email,
        name: res.data.data.name,
        password: res.data.data.password,
        photo: res.data.data.photo,
        password_confirmation: res.data.data.password,
        role: res.data.data.role,
        image: ''
      }
              })  
             .catch(err => {
              console.error(err)
            })
       },
       getMessages() {
           axios.get(`http://localhost:8000/api/messages`)
             .then(res => {
                 console.log(res.data.data); 
                 this.messages = res.data.data
              })  
             .catch(err => {
              console.error(err)
            })
       },
       onImageChange(e) {
                
                this.user.image = e.target.files[0];

                //this.user.photo = e.target.files[0].name;


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
            }



            },
        updateUserAuth(e) {
          console.log('this.user.image');
          console.log(this.user.image);
          e.preventDefault();
                let currentObj = this;
 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.user.image);
                formData.append('name', this.user.name);
                formData.append('email', this.user.email);
                formData.append('photo', this.user.photo);
                formData.append('role', this.user.role);
                formData.append('password', this.user.password);
           //axios.put('http://localhost:8000/api/auth/user/update', {user: this.user, image: this.image})
           //axios.post('http://localhost:8000/api/auth/user/update', this.user)
           axios.post('http://localhost:8000/api/auth/user/update', formData, config)
           .then(res => {
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
            })
           .catch(err => console.error(err));    
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
    axios.delete(`http://localhost:8000/api/messages/`+ id)
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
       this.getUserAuth();
       this.getMessages();
   },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
