<div class="row dashboard">
      <h5>Dashboard</h5>
      <div class="col s12 dashboard-main">
        <div class="col s3">
          <div class="card horizontal red lighten-2">
            <div class="card-image">
              <i class="large material-icons" style="margin: 20px 0 0 20px;"
                >add_shopping_cart</i
              >
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p style="font-size: 30px;">
                  <?= $order ?>
                </p>
                <h6>New Order</h6>
              </div>
              <div class="card-action">
                <a href="#">checkout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s3">
          <div class="card horizontal teal accent-1">
            <div class="card-image">
              <i class="large material-icons" style="margin: 20px 0 0 20px;"
                >person</i
              >
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p style="font-size: 30px;">
                <?= $member ?>
                </p>
                <h6>Member</h6>
              </div>
              <div class="card-action">
                <a href="#">checkout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s4">
          <div class="card horizontal amber lighten-1">
            <div class="card-image">
              <i class="large material-icons" style="margin: 20px 0 0 20px;"
                >assignment</i
              >
            </div>
            <div class="card-stacked">
              <div class="card-content">
                <p style="font-size: 30px;">
                <?php foreach( $income as $total): ?>
                	<?php if($total['total']==""){ 
                  		 echo "0";
                  	 }else{ 
                  		echo $total['total'];
                  	 } ?>
                <?php endforeach; ?>
                </p>
                <h6>Income Today</h6>
              </div>
              <div class="card-action">
                <a href="#">checkout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>