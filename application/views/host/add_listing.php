<div class="hostNav" style="text-align:center">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('host_controller/get_listing') ;?>"><button >View your listing</button></a></li>
        <li><a href="#">Add new listing</a></li>
        <li><a href="<?php echo site_url('host_controller/get_edit_listing') ;?>" onclick ="getListingUpdate('html')">Edit your listing</a></li>
        <li><a href="<?php echo site_url('host_controller/delete_listing') ;?>" onclick="getListingDelete('html')">Delete your listing</a></li>
      </ul>
    </div>
  </nav>
</div>
<div class="addform">
  <form enctype="multipart/form-data" method="POST" id="AddForm">
    <table class="table" id="table_add">
      <tr>
        <td style="text-align:left">TITLE</td>
        <td style="text-align:left"><input type="text" name="title" size="70" maxlength="30"></td>
      </tr>
      <tr>
        <td style="text-align:left">DESCRIPTION</td>
        <td style="text-align:left"><textarea name="description" cols="70" rows="10" placeholder="Give short description for your car"></textarea></td>
      </tr>
      <tr>
        <td style="text-align:left">COVER PHOTO</td>
        <td style="text-align:left"><input type="file" name="cover_photo" require></td>
      </tr>
      <tr>
        <td style="text-align:left">OTHER PHOTOS</td>
        <td style="text-align:left"><input type="file" name="other_photo[]" multiple></td>
      </tr>
      <tr>
        <td style="text-align:left">TYPE OF CAR</td>
        <td style="text-align:left"><input type="text" name="type_of_car"></td>
      </tr>
      <tr>
        <td style="text-align:left">YEAR</td>
        <td style="text-align:left"><input type="number" name="year"></td>
      </tr>
      <tr>
        <td style="text-align:left">CANCELLATION POLICY</td>
        <td style="text-align:left">
          <select style="width:260px; height:35px;" name="cancellation_policy">
            <option value="">Choose option</option>
            <option value="flexible">Flexible</option>
            <option value="moderate">Moderate</option>
            <option value="strict">Strict</option>
          </select>
        </td>
      </tr>
    </table>
  </form>
  <div style="text-align:center">
      <button onclick="AddListing()" class="btn btn-info" style="font-size:1.0em">SAVE</button>
  </div>
