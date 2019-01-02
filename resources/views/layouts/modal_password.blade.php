
<!-- Modal -->
<div class="modal fade" id="passwordChange" tabindex="-1" role="dialog" aria-labelledby="passwordChange" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tukar Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
	    <form method="POST" action="/studentpass" id="passform">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">

          <div class="form-group">
            <label class="form-label">Old Password</label>
            <input type="password" class="form-control" name="oldpass" required>
          </div>

          <div class="form-group">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="newpass" required>
          </div>

        <button type="submit" class="btn btn-primary float-right ml-2">Save changes</button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>

	    </form>
      </div>

    </div>
  </div>
</div>