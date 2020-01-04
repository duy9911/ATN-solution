<!DOCTYPE html>
<html>
    <head>
        <title>Tra Thuy Thuat</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="banner">
                    
                   <h1 align="center"><a href="khach.php" >HTX Trà sạch Thủy Thuật</a></h1>
                   <h2 align="right" > <a href="login.php">Login </a> </h2>
        </li>
		</div>
                <div class="nav">
                    <ul>
                        <li><a href="khach.php">Home</a></li>
                        <?php
                        require_once('./dbconnector.php');
                        
                        $query = "Select * From category";
                        $rows = queryMysql($query);
                         foreach ($rows as $r) {
                            ?>
                            <li><a href="detailpage.php?CatID=<?= $r['CatID'] ?>"><?= $r['CatName'] ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="main">               
                <div class="hot">
                    <div class="image">
                        <img src="images/tea.jpeg" alt="banner">
                    </div>
                    <div class="detail">
                        <div class="title">
                            Trang Trại Trà Thủy Thuật
                        </div>
                        <div class="des">
                            Trang Trại Trà Thủy Thuật Sử Dụng Công Nghệ Nuôi Trồng Hướng Hữu Cơ, Đã Đạt Chuyển VietGap và UTZ ! 
                        </div>
                    </div>
                </div>
                <div class="seperator">

                </div>
                <div class="list">
                    <?php
					//instance an object DBConnector
                    
					//call the function of object DBConnector
                    $rows = queryMysql('Select * From product');

                    foreach ($rows as $r) {
                        ?>

                        <div class="item">
                            <div class="ititle"><?= $r['ProName'] ?></div>
                            <div class="iimage">
                                 <img src="./images/products/<?= $r['ProImage'] ?>" alt="">
                            </div>
                            <div class="ides">
				<?= $r['ProPrice'] ?> 
                            </div>
                            <div class="idetail">
                                <div class="buttondetail">
                                    Price	
                                </div>
                                 <br>
                                <p class="buttondetail">
                                    <a href="productdetail1.php?proid=<?= $r['ProID'] ?>"> Detail </a>
                                </p>
                                  
                                
                            </div>
                        </div>
						<?php
						}
						?>
                </div>
            </div>
            <div class="footer">

            </div>
        </div>
    </body>
</html>