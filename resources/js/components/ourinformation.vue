<template>

<div>
<section class="content">
    <div class="row">
  <div v-if="empty == false" class="col-md-12">
          <form @submit.prevent="create">
            <!--<form @submit="createcar" enctype="multipart/form-data">-->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                <label for="inputName">Address</label>
                <input name="address" v-model="information.address" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.address.required">Last Address is required</div>
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input name="email" v-model="information.email" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.email.required">Last Email is required</div>
              </div>
              <div class="form-group">
                <label for="url_twitter">Twitter</label>
                <input name="url_twitter" v-model="information.url_twitter" type="text" id="url_twitter" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_twitter.required">twitter is required</div>
              </div>
              <div class="form-group">
                <label for="url_instagrame">Instagrame</label>
                <input name="url_instagrame" v-model="information.url_instagrame" type="text" id="url_instagrame" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_instagrame.required">instagrame is required</div>
              </div>
              <div class="form-group">
                <label for="url_maps">Maps</label>
                <input name="url_maps" v-model="information.url_maps" type="text" id="url_maps" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_maps.required">url_maps is required</div>
              </div>
              <div class="form-group">
                <label for="url_facebook">Facebook</label>
                <input name="url_facebook" v-model="information.url_facebook" type="text" id="url_facebook" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_facebook.required">url_facebbok is required</div>
              </div>
              <div class="form-group">
                <label for="about">About</label>
                <input name="about" v-model="information.about" type="text" id="about" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.about.required">url_facebbok is required</div>
              </div>
              
                    
                     
                       
                      
                       
                      
                  
            </div>

                <div class="col-md-6">

                  <div class="form-group">
                <label for="inputName">Telephone</label>
                <input name="telephone" v-model="information.telephone" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.telephone.required">Last Telephone is required</div>
              </div>

            
              <div class="form-group">
                <label for="Dateentry">Start Work From</label>
                <input name="start_work_from" v-model="information.start_work_from" type="date" id="Dateentry" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.start_work_from.required">required</div>
              </div>
              <div class="form-group">
                <label for="Dateentry">End Work To</label>
                <input name="end_work_to" v-model="information.end_work_to" type="date" id="Dateentry" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.end_work_to.required">required</div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChange" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChangeI" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChangeII" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

                </div>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Create</button>
            </div>
            <!-- /.card-body -->
          </div>
          </form>
      </div>

        <div v-if="empty == true" class="col-md-12">
          <form @submit.prevent="update">
            <!--<form @submit="createcar" enctype="multipart/form-data">-->
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Information</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                <label for="inputName">Address</label>
                <input name="address" v-model="information.address" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.address.required">Last Address is required</div>
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input name="email" v-model="information.email" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.email.required">Last Email is required</div>
              </div>
              <div class="form-group">
                <label for="url_twitter">Twitter</label>
                <input name="url_twitter" v-model="information.url_twitter" type="text" id="url_twitter" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_twitter.required">twitter is required</div>
              </div>
              <div class="form-group">
                <label for="url_instagrame">Instagrame</label>
                <input name="url_instagrame" v-model="information.url_instagrame" type="text" id="url_instagrame" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_instagrame.required">instagrame is required</div>
              </div>
              <div class="form-group">
                <label for="url_maps">Maps</label>
                <input name="url_maps" v-model="information.url_maps" type="text" id="url_maps" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_maps.required">url_maps is required</div>
              </div>
              <div class="form-group">
                <label for="url_facebook">Facebook</label>
                <input name="url_facebook" v-model="information.url_facebook" type="text" id="url_facebook" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.url_facebook.required">url_facebbok is required</div>
              </div>
              <div class="form-group">
                <label for="about">About</label>
                <input name="about" v-model="information.about" type="text" id="about" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.about.required">url_facebbok is required</div>
              </div>
              
                    
                     
                       
                      
                       
                      
                  
            </div>

                <div class="col-md-6">

                  <div class="form-group">
                <label for="inputName">Telephone</label>
                <input name="telephone" v-model="information.telephone" type="text" id="inputName" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.telephone.required">Last Telephone is required</div>
              </div>

            
              <div class="form-group">
                <label for="Dateentry">Start Work From</label>
                <input name="start_work_from" v-model="information.start_work_from" type="date" id="Dateentry" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.start_work_from.required">required</div>
              </div>
              <div class="form-group">
                <label for="Dateentry">End Work To</label>
                <input name="end_work_to" v-model="information.end_work_to" type="date" id="Dateentry" class="form-control">
                <div style="color: red" v-if="submitted && !$v.information.end_work_to.required">required</div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChange" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChangeI" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

              <div class="form-group">
                    <label for="exampleInputFile">Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" v-on:change="onImageChangeII" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>        
                      </div>
                    </div>
              </div>

                </div>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Update</button>
              <button type="button" @click="onDelete()" class="btn btn-danger btn-block">Delete ALL</button>
            </div>
            <!-- /.card-body -->
          </div>
          </form>
      </div>



      <!--<div v-if="editCar == true" class="col-md-12">
       <form @submit.prevent="update">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Car</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus" aria-hidden="true"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                <label for="inputName">Name car</label>
                <input name="name" v-model="car.name" type="text" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input name="price" v-model="car.price" type="text" id="price" class="form-control">
              </div>
              <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
              </div>

                  <div class="form-group">
                    <label>Suitcase</label>
                    <select name="suitcase" v-model="car.suitcase" class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
                  
                      <div class="form-group">
                      <div class="custom-control custom-checkbox">
                          <input name="automatique" v-model="car.automatique" class="custom-control-input" type="checkbox" id="custCheckbox1" :checked="car.automatique == 'true'">
                          <label for="custCheckbox1" class="custom-control-label">automatique</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="audio_input" v-model="car.audio_input" class="custom-control-input" type="checkbox" id="customCckbox2">
                          <label for="customCckbox2" class="custom-control-label">audio_input</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="bluetouth" v-model="car.bluetouth" class="custom-control-input" type="checkbox" id="customCheckx3">
                          <label for="customCheckx3" class="custom-control-label">bluetouth</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="fm_radio" v-model="car.fm_radio" class="custom-control-input" type="checkbox" id="customChebox3">
                          <label for="customChebox3" class="custom-control-label">fm_radio</label>
                        </div>
                    </div>
                    
                     
                       
                      
                       
                      
                  
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label>Consumption ratio</label>
                    <select name="consumption_ratio" v-model="car.consumption_ratio" class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Portes</label>
                    <select name="portes" v-model="car.portes" class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Places</label>
                    <select name="places" v-model="car.places" class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
            
              <div class="form-group">
                <label for="Dateentry">Date Entry</label>
                <input name="date_entry" v-model="car.date_entry" type="date" id="Dateentry" class="form-control">
              </div>
              <div class="form-group">
                       <div class="custom-control custom-checkbox">
                          <input name="heatedseats" v-model="car.heatedseats" class="custom-control-input" type="checkbox" id="customCheck" value="option1">
                          <label for="customCheck" class="custom-control-label">Heatedseats</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="air_conditioner" v-model="car.air_conditioner" class="custom-control-input" type="checkbox" id="customCheckb" value="option1">
                          <label for="customCheckb" class="custom-control-label">Air Conditioner</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="allwheeldrive" v-model="car.allwheeldrive" class="custom-control-input" type="checkbox" id="customCheckbo" value="option1">
                          <label for="customCheckbo" class="custom-control-label">Allwheeldrive</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                          <input name="usb_input" v-model="car.usb_input" class="custom-control-input" type="checkbox" id="customCheckbox" value="option1">
                          <label for="customCheckbox" class="custom-control-label">Usb Input</label>
                        </div>
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
            
          </div>
          </form>
      </div>-->
    </div>
   <!-- <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cars</h3>

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
                      <th style="width: 30%">
                          Name
                          Car
                      </th>
                      <th>
                          <img src="data:image/png;base64,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" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 10%">
                          <img src="https://toppng.com/public/uploads/preview/expensive-price-icon-expensive-icon-11553444824zgt1ierp0c.png" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 10%">
                          <img src="http://cdn.onlinewebfonts.com/svg/img_147839.png" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 14%">
                          <img src="https://banner2.kisspng.com/20180522/qph/kisspng-computer-icons-icon-design-suitcase-baggage-suitcase-design-5b039b74f14d95.4647738715269630609884.jpg" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                        <img src="https://png.pngtree.com/svg/20161223/average_fuel_consumption_1262039.png" width="40px" height="40px" style="border-radius: 50%" />
                          
                      </th>
                      <th style="width: 17%">
                          <img src="https://img.icons8.com/material/452/car-door--v2.png" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                          <img src="https://icon-library.net//images/automatic-icon/automatic-icon-9.jpg" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                          <img src="https://www.icone-png.com/png/16/15526.png" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                          <img src="https://www.icone-png.com/png/26/26312.png" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                          <img src="data:image/png;base64,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" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                          <img src="data:image/png;base64,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" width="40px" height="40px" style="border-radius: 50%" />
                      </th>
                      <th style="width: 28%">
                        <img src="data:image/png;base64,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" width="40px" height="40px" style="border-radius: 50%" />
                          
                      </th>
                      <th style="width: 28%">
                        <img src="https://cdn0.iconfinder.com/data/icons/music-vol-1-3/65/5-512.png" width="40px" height="40px" style="border-radius: 50%" />
                          
                      </th>

                      <th style="width: 28%">
                        <img src="data:image/png;base64,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" width="40px" height="40px" style="border-radius: 50%" />
                          
                      </th>
                      <th style="width: 28%">
                          Date Entry
                      </th>
                      <th style="width: 53%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr v-for="(car, index) in filteredCars">
                      <td>
                          <a>
                              {{ car.name }}
                          </a>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar img-car" :src="'/images/'+car.photo"height="40px" width="40px">
                              </li>
                          </ul>
                      </td>
                      <td>
                          {{ car.price }} DH
                      </td>
                      <td>
                          {{ car.places }}
                      </td>
                      
                      <td>
                          {{ car.suitcase }} 
                      </td>
                        <td>
                          {{ car.consumption_ratio }} %
                        
                      </td> 
                      <td>
                          {{ car.portes }}
                      </td>
                      <td>
                          <i v-if="car.automatique == 1 || car.automatique == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.automatique == null || car.automatique == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                        <i v-if="car.audio_input == 1 || car.audio_input == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.audio_input == null || car.audio_input == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                          <i v-if="car.bluetouth == 1 || car.bluetouth == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.bluetouth == null || car.bluetouth == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                          <i v-if="car.heatedseats == 1 || car.heatedseats == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.heatedseats == null || car.heatedseats == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                          <i v-if="car.air_conditioner == 1 || car.air_conditioner == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.air_conditioner == null || car.air_conditioner == 0"  class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                          <i v-if="car.allwheeldrive == 1 || car.allwheeldrive == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.allwheeldrive == null || car.allwheeldrive == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td>
                      <td>
                        <i v-if="car.usb_input == 1 || car.usb_input == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.usb_input == null || car.usb_input == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td> 
                    
                      <td>
                        <i v-if="car.allwheeldrive == 1 || car.allwheeldrive == 'true'" class="fa fa-check" aria-hidden="true"></i>
                          <i v-if="car.allwheeldrive == null || car.allwheeldrive == 0" class="fa fa-times" aria-hidden="true"></i>
                      </td> 
                      <td>
                          {{ car.date_entry }}
                      </td>               
                      <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" @click="editcar(car.slug)" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <button type="button" @click="onDelete(car.id)" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </div>
                    </td>
                  </tr>
              </tbody>
          </table>
        </div>
      </div>
      </div>-->
  
  </section>
  </div>

</template>

<script>
  import { required , minLength, between, email, sameAs } from 'vuelidate/lib/validators';
  export default {  
    data () {
    return {
      submitted: false,
      image: '',
      imagei: '',
      imageii: '',
      informations: '',
      empty: false,
      information: {
        address: '',
        url_facebbok: '',
        url_instagrame: '',
        url_twitter: '',
        url_maps: '',
        email: '',
        about: '',
        telephone: '',
        start_work_from: '',
        end_work_to: '',
        slider_img_i: '',
        slider_img_ii: '',
        slider_img_iii: '',
      }

    }
  },
  validations: {
   
    information: {
            address: {
                required 
              },
            url_twitter: {
                required 
              },
            url_maps: {
                required 
              },
            url_instagrame: {
                required 
              },
            url_facebook: {
                required 
              },
            email: {
                required 
              },
            about: {
                required 
              },
            telephone: {
                required 
              },
            start_work_from: {
                required 
              },
            end_work_to: {
                required 
              },
  }},
  methods: {

    onImageChange(e) {
                console.log(e.target.files[0]);
                this.image = e.target.files[0];
            },
            onImageChangeI(e) {
                console.log(e.target.files[0]);
                this.imagei = e.target.files[0];
            },
            onImageChangeII(e) {
                console.log(e.target.files[0]);
                this.imageii = e.target.files[0];
            },
            getInformation() {
        axios.get(`http://localhost:8000/api/info/1`)
            .then(res => {
              if(res.data.data[0]) {
                this.empty = true;
                this.informations = res.data.data[0];  
              }
              })
             .catch(err => console.error(err))
      },
      onDelete() {

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
    axios.delete(`http://localhost:8000/api/info/1`)
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
                
    },
      update() {
       this.submitted = true;

                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                //alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.user));


    
           axios.put('http://localhost:8000/api/info/1', this.information)
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

            this.submitted = false;
                  
            $('#editUser').modal('hide');
            })
           .catch(err => console.error(err));    
        },
      editInformation() {
            axios.get(`http://localhost:8000/api/information/1`)
                .then(res => {
                this.information = {
                        address: res.data.data[0].address,
                        url_facebook: res.data.data[0].url_facebook,
        url_instagrame: res.data.data[0].url_instagrame,
        url_twitter: res.data.data[0].url_twitter,
        url_maps: res.data.data[0].url_maps,
        email: res.data.data[0].email,
        about: res.data.data[0].about,
        telephone: res.data.data[0].telephone,
        start_work_from: res.data.data[0].start_work_from,
        end_work_to: res.data.data[0].end_work_to,
        slider_img_i: res.data.data[0].slider_img_i,
        slider_img_ii: res.data.data[0].slider_img_ii,
        slider_img_iii: res.data.data[0].slider_img_iii,
                    }   
              });
        },
      create(e) {

        this.submitted = true;
                // stop here if form is invalid
                this.$v.$touch();
                if (this.$v.$invalid) {
                    return;
                }

                //alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.car));

                e.preventDefault();
                let currentObj = this;
 
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
 
                let formData = new FormData();
                formData.append('image', this.image);
                formData.append('imagei', this.imagei);
                formData.append('imageii', this.imageii);
                formData.append('address', this.information.address);
                formData.append('url_twitter', this.information.url_twitter);
                formData.append('url_facebook', this.information.url_facebook);
                formData.append('url_instagrame', this.information.places);
                formData.append('url_maps', this.information.url_maps);
                formData.append('email', this.information.email);
                formData.append('about', this.information.about);
                formData.append('telephone', this.information.telephone);
                formData.append('start_work_from', this.information.start_work_from);
                formData.append('end_work_to', this.information.end_work_to);


        axios.post('http://localhost:8000/api/information', formData, config)
                .then(res => { 
                  this.submitted = false; 
                  const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

Toast.fire({
  type: 'success',
  title: 'Car is Created'
})
                
                })
                .catch(err => { console.error(err) }); 
      },
    
      
    },
    created() {
      this.getInformation();
      this.editInformation();
    },
    computed: {
      
    }
}

    
</script>
<style>

</style>
