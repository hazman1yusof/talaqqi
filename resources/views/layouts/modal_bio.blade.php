
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Bio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
	    <form method="POST" action="/student_bio" id="bioform" enctype="multipart/form-data">
        @csrf

	      <div class="form-group d-flex">
          <div class="col-8 pl-0">
            <label class="form-label">name</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fe fe-user"></i>
              </span>
              <input type="text" class="form-control" placeholder="name" name="name" value="{{$user->name}}" disabled>
            </div>
          </div>

          <div class="col-4 pr-0">
            <label class="form-label">User ID</label>
            <input type="text" class="form-control" placeholder="Last Name" value="{{$user->id}}" disabled name="id_c">
            <input type="hidden" name="id" value="{{$user->id}}">
          </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Bio Image</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image_file" accept="image/*" name="image_file">
              <label class="custom-file-label" for="image_file">Change Image</label>
            </div>
          </div>
        </div>

        <div class="form-group d-flex">
          <div class="col pl-0">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{$user->firstname}}" required>
          </div>

          <div class="col pr-0">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{$user->lastname}}" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Biodata</label>
          <textarea class="form-control" name="bio" rows="2" placeholder="Biodata">{{$user->bio}}</textarea>
        </div>

        <div class="form-group d-flex">
          <div class="col pl-0">
            <label class="form-label">Facebook</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-facebook"></i>
              </span>
              <input type="text" class="form-control" placeholder="Facebook" name="facebook" value="{{$user->facebook}}">
            </div>
          </div>

          <div class="col pr-0">
            <label class="form-label">Twitter</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-twitter"></i>
              </span>
              <input type="text" class="form-control" placeholder="Twitter" name="twitter" value="{{$user->twitter}}">
            </div>
          </div>
        </div>

        <div class="form-group d-flex">
          <div class="col pl-0">
            <label class="form-label">Whatsapp / Handphone</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-phone"></i>
              </span>
              <input type="text" class="form-control" placeholder="Whatsapp / Handphone" name="whatsapp" value="{{$user->whatsapp}}">
            </div>
          </div>

          <div class="col pr-0">
            <label class="form-label">Instagram</label>
            <div class="input-icon">
              <span class="input-icon-addon">
                <i class="fa fa-instagram"></i>
              </span>
              <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{$user->instagram}}">
            </div>
          </div>
        </div>

        <hr>

        <div class="form-group d-flex">
          <div class="col pl-0">
            <input type="hidden" name="gender_h" disabled value="{{$user->gender}}">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-control custom-select" value="{{$user->gender}}" >
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>

          <div class="col pr-0">
            <input type="hidden" name="marital_h" disabled value="{{$user->marital}}">
            <label class="form-label">Marital Status</label>
            <select name="marital" class="form-control custom-select"">
              <option>Single</option>
              <option>Married</option>
              <option>Other</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Address</label>
          <textarea class="form-control" name="address" rows="2" placeholder="Address">{{$user->address}}</textarea>
        </div>

        <div class="form-group d-flex">
          <div class="col pl-0">
            <label class="form-label">Postcode</label>
            <input type="text" class="form-control" placeholder="Postcode" name="postcode" value="{{$user->postcode}}">
          </div>
          <div class="col pr-0">
            <label class="form-label">State</label>
            <input type="text" class="form-control" placeholder="State" name="state" value="{{$user->state}}">
          </div>
        </div>

        <button type="submit" class="btn btn-primary float-right ml-2">Save changes</button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>

	    </form>
      </div>
    </div>
  </div>
</div>