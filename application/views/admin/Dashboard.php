

<body class="listing_table">

<form action="" >
<?php echo $this->session->flashdata('login_susessful'); ?>
<table>
        <tr class="content">
            <th class="box_1">
                <h2>order  <br><br><?php echo $count_order  ?></h2>
            </th>
            <th class="box_2"> 
                <h2>total product <br><br><?php echo $count_product  ?></h2>
            </th>
        </tr>
        <tr class="content">
            <td class="box_1">
                <h2>Total coupon <br><br><?php echo $count_coupon ?></h2>
            </td>
            <td class="box_2"> 
                <h2>Total Users  <br><br><?php echo $count_user; ?></h2>
            </td>
        </tr>
    </table>
</form>
<h3 class="last_two_day">Last 2 days in progress 
    <button onclick="myFunction()" onclick="return change(this)" id="myButton" value="Close">Close</button>
 </h3>

<div class="wrapper" id="main_contant">
      <table align=center class="table">
          <thead>
              <tr><br>
                  <th>id</th>
                  <th>user name</th>
                  <th>customer</th>
                  <th>amount subtotal</th>
                  <th>tax()</th>
                  <th>discount</th>
                  <th>shipping charges</th>
                  <th>total</th>
                  <th>order date</th>
                  <th>order status</th>
              </tr>
          </thead>
  
      <?php
  
      foreach($ord_list as $row){
          $order_status = unserialize($row->status);
          foreach($order_status as $data){
  
          }
      ?>
  
      <tr>
          <td><?php echo $row->id; ?></td>
          <td><?php echo $row->user_id; ?></td>
          <td><?php echo $row->customer; ?></td>
          <td><?php echo $row->amount_subtotal; ?></td>
          <td><?php echo $row->tax; ?></td>
          <td><?php echo $row->discount; ?></td>
          <td><?php echo $row->ship_charge; ?></td>
          <td><?php echo $row->total; ?></td>
          <td><?php echo $row->order_date; ?></td>
          <td><?php echo $data; ?></td>
      </tr>
  
      <?php
      }
      ?>
  
      </table>
  </form>  
</div>
</body>

<script>
function myFunction() {
  var x = document.getElementById("main_contant");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
  var btn = document.getElementById("myButton");

    if (btn.value == "Open") {
        btn.value = "Close";
        btn.innerHTML = "Close";
    }
    else {
        btn.value = "Open";
        btn.innerHTML = "Open";
    }
}

</script>