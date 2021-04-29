<div class="pb-1"></div>
<div class="row">
    <div class="col-sm-3 category-bar bg-light">
    <form action="<?php echo base_url('search');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="search" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="btn btn-outline-warning" type="submit">Search</button>
          </div>
        </div>
    </form>
        <h3>Product categories</h3><hr>
        <?php
         foreach ($get_all_category as $row) {
        ?>
        <p><a href="<?php echo base_url('category/'.$row->category_slug); ?>"><?php echo $row->category_name; ?></a>
        <span>
        (<?php 
        $q = $this->db->select()->where('product_category',$row->id)->get('tbl_product');
        echo $q->num_rows();
        ?>)</span></p>
        <?php } ?>
    </div>

    <div class="col-sm-9">
        <div class="content_top">
            <div class="heading">
                <h3>You Are Searching For <b style="color:red"><?php if($search){echo $search;}?></b></h3>
            </div>
        </div>

        <?php
        if($get_all_product) {
        $arr_chunk_product = array_chunk($get_all_product, 4);

        foreach ($arr_chunk_product as $chunk_products) {
            ?>
            <div class="row  featured">
                <?php foreach ($chunk_products as $row) { ?>
                    <div class="col-sm-3 products col-6">
                        <div class="card h-100 text-center">
                            <a href="<?php echo base_url('single-product/' . $row->product_slug); ?>">
                            <img class="card-img-top product-image" src="<?php echo base_url('uploads/' . $row->product_image) ?>" alt="" /></a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row->product_title; ?> </h5>
                            <?php if($row->id == "9") :?>
                            <p class="card-text"><span class="price">Donation Based Products</span></p>
                            <a class="my-btn" href="<?php echo base_url('/'); ?>">Donate</a>
                            <?php else : ?>
                            <p class="card-text"><span class="price"><?php echo $this->cart->format_number($row->product_price); ?> ₹</span></p>
                            <a class="my-btn" href="<?php echo base_url('single-product/' . $row->product_slug); ?>">Buy</a>
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }} else{
            echo "<h2 class='card p-5 text-center'>No product found related '$search'";
        }
        ?>
    </div>    
</div>
