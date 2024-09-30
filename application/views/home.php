
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- <link rel="stylesheet" href="../asset/css/design.css"> -->
   
</head>
<body>
    <div class="banner">
        <div class="owl-carousel owl-theme owl-carousel-banner ">
                <!-- <div class="item">
                    <img src="<?php echo base_url().'img/banner2.jpg'?>" alt="" >
            </div> -->
                <div class="item">
                    <img src="<?php echo base_url().'img/banner.jpg'?>" alt="" class="banner2">
                </div>
        </div>
    </div><br><hr>
    <div class="home_wrap">
        <div class="all_cate">
            <h1 class="title heading">Categories</h1>
            <form method="post" action="index.php/home_page"> 

                <?php
            // var_dump($categories);
                foreach($categories as $row){
                    $img = unserialize($row->cat_img);
                ?>

                <div class="product_list">
                <a href="<?php echo base_url('index.php/product_client/get_categories?id=')?><?php echo $row->id ?>"><img src="<?php echo base_url().'upload/'. $img[0]; ?>"  class="home_and_categories"></a>
                <a href="" class="product_name title"><?php echo $row->cat_title; ?></a>

                </div>
                <?php
                }
                ?>
                
            </div>
            <div class="top_pro">
            <hr>
                <h1 class="title heading">top product</h1>
                <?php
                    //var_dump($top_product);
                    foreach($top_product as $row){
                        $img = unserialize($row->images);

                        // var_dump($row['images']); die();
                ?>

                <div class="top_product">
                    <a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->id?>"><img src="<?php echo base_url().'/upload/'. $img[0]; ?>"  class="product_img"></a>
                    <a href="" class="product_name">Name   <?php echo $row->product_name; ?></a>
                    <a href="" class="product_price">price   <?php echo  $row->product_price; ?></a>
                    <a href="<?php echo base_url('index.php/cart_client/add_card?id=')?><?php echo $row->id.'&quantity=1'?>" name="add_card" value="ADD CARD" class="btns ">add card</a>
                    <a href="<?php echo base_url(''); ?>index.php/Product_client/get_product?id=<?php echo $row->id; ?>" class="single_view">view</a>



                </div>
                <?php
                }
                ?>
            </div>
    </form>
    </div>

    
    <script>

$('.owl-carousel-banner').owlCarousel({
          loop:true,
          margin:10,
          autoHeight:true,
          responsive:{
              0:{
                  items:1
              }
              
          }
      })

    </script>











