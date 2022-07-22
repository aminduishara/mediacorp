<form class="rounded p-5 m-5 shadow-sm">
    

    <div class="row"  style="display:<?php echo $visibility?>">
        <div class="form-group col-sm-12">
            <label for="exampleInputName" class="form-label"><?php echo $row->mas_reglable_text?></label><br>
                <select class="form-select" name="economy">
                    <option value="China">China</option>
                    <option value="Australia">Australia</option>
                    <option value="Myanmar">Myanmar</option>
                </select>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <div class="wrapper">
                <div class="input-data">
                    <input type="text" name="des" id="des" required>
                    <div class="underline"></div>
                    <label class="form-label">Description</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-4">
                <div class="form-group col-sm-12 text-center">
                    <button type="submit" class="text-white float-end" 
                    style="width: 150px;
                    height: 40px;
                    padding: 7px 10px;
                    border-radius: 25px;
                    border:none;
                    font-size: 15px;
                    text-align: center;
                    background-color:#0000FF">Add</button>
                </div>
    </div> 
</form>

<div class="m-5">
<table class="table rounded shadow-sm text-center align-content-center">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <button class="btn btn-sm btn-danger">Delete</button>
        <button class="btn btn-sm btn-primary">Edit</button>
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>
        <button class="btn btn-sm btn-danger">Delete</button>
        <button class="btn btn-sm btn-primary">Edit</button>
      </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry the Bird</td>
      <td>Thornton</td>
      <td>@twitter</td>
      <td>
        <button class="btn btn-sm btn-danger">Delete</button>
        
        <button class="btn btn-sm btn-primary">Edit</button>
      </td>
    </tr>
  </tbody>
</table>
</div>