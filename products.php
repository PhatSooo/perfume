<?php include 'inc/header.php'; ?>
<!-- Page Content -->
<div class="products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="filters">
          <ul>
            <li class="active">All Products</li>
            <?php
            $get_cate = $cate->list_cate_by_status();
            while ($res = $get_cate->fetch_assoc()) {
              switch ($res['id']) {
                case 1:
                  echo '<li data-filter=".ver">' . $res['cate_name'] . '</li>';
                  break;
                case 2:
                  echo '<li data-filter=".cha">' . $res['cate_name'] . '</li>';
                  break;
                case 3:
                  echo '<li data-filter=".vic">' . $res['cate_name'] . '</li>';
                  break;
                case 4:
                  echo '<li data-filter=".lou">' . $res['cate_name'] . '</li>';
                  break;
              }
            ?>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="col-md-12">
        <div class="filters-content">
          <div class="row grid">
            <?php
            $get = $prod->list_prod_by_Status();
            while ($row = $get->fetch_assoc()) {
            ?>
              <div class="col-lg-4 col-md-4 all 
              <?php switch ($row['prod_cateId']) {
                case 1:
                  echo 'ver';
                  break;
                case 2:
                  echo 'cha';
                  break;
                case 3:
                  echo 'vic';
                  break;
                case 4:
                  echo 'lou';
                  break;
              } ?>">
                <div class="product-item">
                  <a href="product_single.php?id=<?= $row['id'] ?>"><img src="admin/uploads/<?= $row['prod_image'] ?>" alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4><?= $row['prod_name'] ?></h4>
                    </a>
                    <h6><?= $row['prod_price'] ?></h6>
                    <p><?= $row['prod_des'] ?></p>
                    <ul class="stars">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span>Reviews (12)</span>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="pages">
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php include 'inc/footer.php'; ?>