
<div class="main">
    <div class="content">
        <div class="error">		
            <h2>404 error</h2>
            <p>You Enter Wrong Url Page Not Found</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                <form  action="<?php echo base_url('search');?>" method="post">
                    <div class="input-group mb-2 mt-2">
                        <input type="text" name="search" class="form-control" placeholder="Find Out here! What are you looking for?" required>
                        <div class="input-group-append">
                          <button class="btn btn-outline-warning" type="submit">Search</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>  	
        <div class="clear"></div>
    </div>
</div>
<style>
    .error{padding:50px 0px}
    .error h2{color:red;text-align: center;font-size: 50px}
    .error p{color:green;text-align: center;font-size:30px}
</style>