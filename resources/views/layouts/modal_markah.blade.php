
<!-- Modal -->
<div class="modal fade" id="modalmarkah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Markah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
	    <form method="POST" action="/talaqqi" id="talaqqiform">
        @csrf
        <input type="hidden" name="id" value="">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="oper" value="add">
        
        <div class="row">
          
          <div class="col form-group">
            <label class="form-label">Kelancaran</label>
            <input type="number" class="form-control" placeholder="Kelancaran" name="kelancaran" step=".01" required>
          </div>

          <div class="col form-group">
            <label class="form-label">Tajwid</label>
            <input type="number" class="form-control" placeholder="Tajwid" name="tajwid" step=".01" required>
          </div>

        </div>

        <div class="row">

          <div class="col form-group">
            <label class="form-label">Tarannum</label>
            <input type="number" class="form-control" placeholder="Tarannum" name="tarannum" step=".01" required>
          </div>

          <div class="col form-group">
            <label class="form-label">Kefasihan</label>
            <input type="number" class="form-control" placeholder="Kefasihan" name="kefasihan" step=".01" required>
          </div>

        </div>

        <div class="row">

          <div class="col form-group">
            <label class="form-label">Surah, ayat terakhir</label>
            <input type="text" class="form-control" placeholder="Surah, ayat terakhir" name="ayat">
          </div>

        </div>

        <div class="form-group">
          <label class="form-label">Komen Ustad</label>
          <textarea class="form-control" rows="3" placeholder="Komen Ustad" name="komen"></textarea>
        </div>


        <div class="form-group">
          <input type="hidden" name="level_h" disabled value="{{$user->level}}">
          <label class="form-label">Student level</label>
          <select name="level" class="form-control custom-select">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary float-right ml-2">Save changes</button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>

	    </form>
      </div>

    </div>
  </div>
</div>