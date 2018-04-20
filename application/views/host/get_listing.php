<div class="hostNav" style="text-align:center">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="#" ><button onclick="getListing('html')">View your listing</button></a></li>
        <li><a href="<?php echo site_url('host_controller/add_listing') ;?>">Add new listing</a></li>
        <li><a href="<?php echo site_url('host_controller/get_edit_listing') ;?>" onclick ="getListingUpdate('html')">Edit your listing</a></li>
        <li><a href="<?php echo site_url('host_controller/delete_listing') ;?>" onclick="getListingDelete('html')">Delete your listing</a></li>
      </ul>
    </div>
  </nav>
</div>
<div>
  <div id="results"></div>
</div>
