<!-- Modal -->
  <div class="modal fade" :id="item_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" class="form-control" id="p_name" :value="p_name" name="name">
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Age:</label>
              <input type="text" class="form-control" id="p_age" :value="p_age" name="age">             
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Profession:</label>
              <input type="text" class="form-control" id="p_profession" :value="p_profession" name="prfession">              
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" @click="editItem()" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>