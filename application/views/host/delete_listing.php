<div class="hostNav" style="text-align:center">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('host_controller/get_listing') ;?>" onclick="getListing('html')">View your listing</a></li>
        <li><a href="<?php echo site_url('host_controller/add_listing') ;?>">Add new listing</a></li>
        <li><a href="<?php echo site_url('host_controller/get_edit_listing') ;?>" onclick ="getListingUpdate('html')">Edit your listing</a></li>
        <li><a href="#" onclick="getListingDelete('html')">Delete your listing</a></li>
      </ul>
    </div>
  </nav>
</div>

  <div id="results"></div>
