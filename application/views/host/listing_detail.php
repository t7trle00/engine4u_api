<div class="hostNav" style="text-align:center">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="#" onclick="getListing('html')">View your listing</a></li>
        <li><a href="<?php echo site_url('host_controller/add_listing') ;?>">Add new listing</a></li>
        <li><a href="<?php echo site_url('host_controller/edit_listing') ;?>">Edit your listing</a></li>
        <li><a href="<?php echo site_url('host_controller/delete_listing') ;?>">Delete your listing</a></li>
      </ul>
    </div>
  </nav>
</div>
<div onload="ShowSpeListing(carID)">
  <img src="<?php echo base_url('cover_gallery/').jsonData[0].cover_photo?>" alt="">

</div>
