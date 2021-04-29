

<div class="row">
    <div class="col-sm-3">
        <div class="card">
          <div class="card-header">
            My Account
          </div>
          <ul class="list-group list-group-flush bg-light">
            <li class="list-group-item"><a class="text-dark" href="<?= base_url ('cart');?>">My Cart</a></li>
            <li class="list-group-item"><a class="text-dark" href="<?= base_url ('my-orders');?>">My Order</a></li>
            <li class="list-group-item"><a class="text-dark" href="<?= base_url ('address-update');?>">Address Update</a></li>
            <li class="list-group-item"><a class="text-dark" href="<?= base_url ('change-password');?>">Change Password</a></li>
            <li class="list-group-item"><a class="text-dark" href="<?= base_url ('customer/logout');?>">Logout</a></li>
          </ul>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="card">
            <div class="card-header">
               <span class="text-capitalize">Hello <?= $this->session->userdata('name') ?> ( not <?= $this->session->userdata('name') ?>? <a class="text-dark" href="<?= base_url ('customer/logout');?>">Logout</a>)</span>
            </div>
            <div class="card-body">
                <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                <h4>Address Details</h4><hr>
                <span class="text-capitalize">Name: <?= $get_shipping_address->customer_name; ?></span><br>
                <span>Email: <?= $get_shipping_address->customer_email; ?></span><br>
                <span>Address: <?= $get_shipping_address->customer_address; ?></span>,
                <span> <?= $get_shipping_address->customer_city; ?></span>,
                <span> <?= $get_shipping_address->customer_state; ?></span>-
                <span><?= $get_shipping_address->customer_zipcode; ?></span><br>
                <span>Ph: <?= $get_shipping_address->customer_phone; ?></span><br>
            </div>
        </div>
    </div>
</div>