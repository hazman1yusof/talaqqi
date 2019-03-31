
<!-- Modal -->
<div class="modal fade" id="modalmarkah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none; padding-bottom: 2px">
        <h5 class="modal-title" id="exampleModalLongTitle">+ Markah Student: <span style="color: #c31d1d;font-style: oblique;">{{$user->name}}</span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body" style="border-bottom: 1px #e9ecef solid; padding-top: 0px">
          <!-- The time is now: <span class="now"></span>, a timer will go off <span class="duration"></span> at <span class="then"></span>
        </div>
        <div class="difference">The timer is set to go off <span></span></div>
        <div class="countdown"></div> -->
        <div class="col text-center">
            <button type="button" class="btn btn-pill btn-outline-info" id="start_timer" data-oper="start">
              <i class="fe fe-play mr-2"></i>Start Timer: <span class="countdown">4:00</span>
            </button>
        </div>
      </div>
      <div class="modal-body">
	    <form method="POST" action="/talaqqi" id="talaqqiform" autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="">
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <input type="hidden" name="oper" value="add">
        
        <div class="row">
          
          <div class="col form-group">
            <label class="form-label">1) Tartil</label>
            <input type="number" class="form-control" placeholder="Tartil" name="kelancaran" step=".01" required>
          </div>

          <div class="col form-group">
            <label class="form-label">2) Fasohah</label>
            <input type="number" class="form-control" placeholder="Fasohah" name="kefasihan" step=".01" required>
          </div>
        </div>

        <div class="row">

          <div class="col form-group">
            <label class="form-label">3) Tarannum</label>
            <input type="number" class="form-control" placeholder="Tarannum" name="tarannum" step=".01" required>
          </div>
          
          <div class="col form-group">
            <label class="form-label">4) Tajwid</label>
            <input type="number" class="form-control" placeholder="Tajwid" name="tajwid" step=".01" required>
          </div>

        </div>

        <div class="row">

          <div class="col form-group">
            <label class="form-label">(Surah:Ayat) From</label>
            <input type="text" class="form-control" placeholder="Surah:Ayat Dari" name="ayat_dari">
          </div>

          <div class="col form-group">
            <label class="form-label">(Surah:Ayat) To</label>
            <input type="text" class="form-control" placeholder="Surah:Ayat Hingga" name="ayat">
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
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="SS">Super Supreme</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary float-right ml-2">Save changes</button>
        <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Cancel</button>

	    </form>
      </div>

    </div>
  </div>
</div>