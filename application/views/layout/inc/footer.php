
</div>
<div class="pb-5"></div>
<footer>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8">
        <div class="footer-menu text-center justify-content-between">
          <?php foreach($footer_menu as $footer_menu ) : ?>
          <a href="<?= base_url($footer_menu->custom_menu_link); ?>"><?= $footer_menu->menu_title; ?></a>
          <?php endforeach; ?>
        </div>
        </div>
        <div class="col-sm-12 p-3 text-center">
            <a href="<?= base_url() ?>"><img width="400px" src="<?= base_url('uploads/'.$get_identity->site_logo);?>" alt="" class="img-fluid"></a>
        </div>
        <div class="col-sm-12 text-center" style="color: darkgray; border-top: 1px solid darkgray">
        <div class="pt-2"></div>
            <a href="<?= $get_identity->company_facebook ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/facebook.png'); ?>" alt=""></a>
            <a href="<?= $get_identity->company_twitter ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/twitter.png'); ?>" alt=""></a>
            <a href="<?= $get_identity->site_insta_link ?>"><img width="30" style="margin: 5px" src="<?= base_url('assets/layout/images/instagram.png'); ?>" alt=""></a><br>
            <span><?= $get_identity->site_copyright ?> - Design By | <a style="color: darkgray;" href="https://masterarts.net">Master Arts</a></sapn>
        </div>
    </div>
</div>
</footer>
<div class="mobile-footer fixed-bottom">
    <div class="d-flex justify-content-between">
        <div class="text-center">
           <a href="<?= base_url('/'); ?>"><img width="17" src="<?= base_url('assets/layout/images/footer_icon/home.png'); ?>" alt=""></a>
           <br>
           <span class="icon-text">Home</span>
        </div>
        <div class="text-center">
           <a href="<?= base_url('contact-us'); ?>"><img width="17" src="<?= base_url('assets/layout/images/footer_icon/call.png'); ?>" alt=""></a>
           <br>
           <span class="icon-text">Contact</span>
        </div>
        <div class="text-center">
           <a href="<?= base_url('blog'); ?>"><img width="17" src="<?= base_url('assets/layout/images/footer_icon/shop.png'); ?>" alt=""></a>
           <br>
           <span class="icon-text">Blog</span>
        </div>
        
        <div class="text-center">
           <?php if($this->session->userdata('id')) : ?>
            <a href="<?= base_url ('/');?>"><img width="17" src="<?= base_url('assets/layout/images/footer_icon/account.png'); ?>" alt=""></a>
            <?php else : ?>
           <a data-toggle="modal" data-target="/" href="#"><img width="17" src="<?= base_url('assets/layout/images/footer_icon/account.png'); ?>" alt=""></a>
           <?php endif; ?>
           <br>
           <span class="icon-text">Account</span>
        </div>
    </div>
</div>
<!-- Bootstrap Bundle with Popper -->

<script type="text/javascript">
                            $(function(){
    $("#div2").hide();
    $("#preview").on("click", function(){
        $("#div1, #div2").toggle();
    });
});


$('#submit').click(function(){
   $('#submit').val("Processing...")
})
$(document).ready(function () {

$("#createForm").submit(function (event) {
            event.preventDefault();
            $.ajax({
              url: "<?php echo base_url('layout/services'); ?>",
              data: $('#createForm').serialize(),
              type: "post",
              async: false,
              dataType: 'json',
              success: function (data) {
                $('#createForm')[0].reset();
                $('#service').html(data.msg);
                $('input[type="submit"]').val('Submited');
              }
            });
          });  
        });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>