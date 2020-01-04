
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <head>
        <title>Trà Thủy Thuật</title>
        <meta charset="UTF-8">
       
    </head>
    <body>
        <div class="container">
            <div class="header">
                  
                <div class="banner">
                    <h1 align="center"><a href="khach.php" >HTX Trà sạch Thủy Thuật</a></h1>
                <h2 align="right" > <a href="login.php">Login </a> </h2>
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
                        <img src="images/cate1.jpeg" alt="">
                    </div>
                    <div class="detail">
                        <div class="title">
                            Trang Trạng Trà Thủy Thuật  
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
//get parameter from client
                    if (isset($_GET['CatID'])) {
                        $CatID = $_GET['CatID'];
                        //create sql query
                        $query = "Select * from Product where CatID = " . $CatID;
                        //instance an object DBConnector
                        //$cn = new mysqli();
                        //call the function of object DBConnector
                        $rows = queryMysql($query);
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
}
?>
                    </div>
                </div>
                <div class="footer">

                </div>
            </div>
    </body>
</html>