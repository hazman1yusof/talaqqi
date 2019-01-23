
<!-- Modal -->
<div class="modal fade" id="modalstudent" tabindex="-1" role="dialog" aria-labelledby="modalstudent" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
  	    <form method="POST" action="/student" id="bioform" enctype="multipart/form-data" autocomplete="off">
          @csrf


          <div class="form-group d-flex">
            <div class="col alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert"></button>
              <ul>
                <li>Only admin can add new student</li>
                <li>To add new student only set his name, the name need to be unique</li>
                <li>Unique ID for the student will be auto generated</li>
                <li>Password will be set as the same as his name, student need to change his password upon first login</li>
                <li>User Role is student, admin only for instructor, admin can add marks for student</li>
              </ul>
            </div>
          </div>

  	      <div class="form-group d-flex">
            <div class="col-8 pl-0">
              <label class="form-label">name</label>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <i class="fe fe-user"></i>
                </span>
                <input type="text" class="form-control" placeholder="name" name="name">
              </div>
            </div>

            <div class="col-4 pr-0">
              <label class="form-label">User ID</label>
              <input type="text" class="form-control" placeholder="Last ID" disabled name="id_c">
              <input type="hidden" name="id">
            </div>
          </div>


          <div class="form-group d-flex">
            <div class="col-8 pl-0">
              <label class="form-label">Password</label>
              <div class="input-icon">
                <input type="text" class="form-control" placeholder="password" name="password" readonly>
              </div>
            </div>

            <div class="col-4 pr-0">
              <label class="form-label">User Role</label>
              <select name="role" class="form-control custom-select">
                <option>Student</option>
                <option>Admin</option>
              </select>
            </div>
          </div>

          <div class="form-group d-flex">
            <div class="col pl-0">
              <label class="form-label">First Name</label>
              <input type="text" class="form-control" placeholder="First Name" name="firstname" >
            </div>

            <div class="col pr-0">
              <label class="form-label">Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name" name="lastname" >
            </div>
          </div>

          <button type="submit" class="btn btn-primary float-right ml-2">Save changes</button>
          <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>

  	    </form>
      </div>
    </div>
  </div>
</div>