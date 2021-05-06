<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('gallery')?>">Image Gallery</a>
        </li>
    </ul>

    <div class="row-fluid">
        <div class="span9">
            <div class="row-fluid">
               <?php foreach($image as $row) : ?>
                <div class="box span3">
                  <button><img style="height: 200px !important" id="<?= $row->img_id ?>" onclick="doWithThisElement(event)" src="<?= base_url('imggallery/'.$row->gallery_image) ?>" alt=""></button>
                </div>
                <?php endforeach; ?>
            </div>
            <?php  echo $this->pagination->create_links(); ?>
        </div><!--/span-->
          <div class="box span3" style="padding:10px">
            <div id="info">
               <h3>Info:</h3>
               <p>Click on image to get url</p><hr>
            </div>
            <div id="imagedeatils" class="hidden">
               <h3>Image Details</h3>
               <img id="imageBox" src="" alt=""><br>
               <a style="color:red" id="DeleteID" href="">Delete Image</a>
               <h3>Image Url</h3>
               <input id="imageUrl" class="span12 typeahead" type="text">
               <button onclick="myFunction()">Copy Url</button>
            </div>
            <h3>Add Image</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save/image');?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label  for="fileInput">Post Image</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="post_image" id="fileInput" type="file"/>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="reset" class="btn">Cancel</button>
                    </fieldset>
                </form>
            </div>        
        </div><!--/span-->
    </div><!--/row-->


</div><!--/.fluid-container-->
<script type="text/javascript">
function doWithThisElement(event) {
    event = event || window.event; // IE
    var target = event.target || event.srcElement; // IE
    $('#imagedeatils').removeClass("hidden");
    $('#info').addClass("hidden");
    var id = target.id;
    var Image = document.getElementById(id).src;
    document.getElementById('imageBox').src = Image;
    document.getElementById('imageUrl').value = Image;
    document.getElementById('DeleteID').href = '<?= base_url('delete/image/') ?>'+id;
}
function myFunction() {
  var copyText = document.getElementById("imageUrl");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}
 
</script>
<!-- end: Content -->