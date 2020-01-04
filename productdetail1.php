<!DOCTYPE HTML>
<html>
<head>
  <title>Product Detail</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style_1.css" />
  <style>
  	.item{
  	width: 25%;
    padding:6px;
    box-sizing: border-box;
    background-color: #E3E6E7;
    margin: 0.25%
        

  }
  .anh{
      width: 50px;
  }

  .iimage img{
  width:100%;
  height: 150PX;
  float: left;
  }
  .khuvuctrungbay{
  	width: 130%;
  	overflow: hidden;
  }
  .Thongtin{
		padding: 5px 10px;
		float: left;
		width: 100%;}
	form.example input[type=text] {
    	padding: 10px;
    	font-size: 17px;
    	border: 1px solid grey;
    	float: left;
    	width: 87%;
    	background: #f1f1f1;
    	height: 20px

	}
	form.example button {
    	float: left;
    	width: 8%;
    	padding: 10px;
    	background: #2196F3;
    	color: white;
    	font-size: 17px;
    	border: 1px solid grey;
    	border-left: none;
    	cursor: pointer;
	}
	.Chitietsanpham{
		position: relative;
		top: 15%;
		padding-ri: 15%;
		width: 50%;
		float: right;
		padding:10px;
		box-sizing: border-box;
	}
	.Chitietsanpham1{
		padding-top: 0%;
		padding-left: 40%;
		width: 100%;
		box-sizing: border-box;
	}

  </style>
</head>
<body>
	<div id="main">
	 


            <div id="content_header">
                
            </div>
    	<div id="site_content">
            
            <ul id="menu">
                            <li class="selected"><a href="khach.php">Home</a></li>
                            <li><a href="login.php">Admin</a></li>
	 </ul>
    	
		    <div id="banner" style="background-image:url(<?php echo 'images/1.png'?>)"></div>

			<div id="sidebar_container">

			    <div class="sidebar">
                                <h1> <b>Category</b></h1>
			        <div class="sidebar_top" style="background-image:url(<?php echo 'images/side_top.png'?>)"></div>
			        <div class="sidebar_item" style="background-image:url(<?php echo 'images/side_back.png'?>) ;">

			        <?php 
			 				require_once('./dbconnector.php');
							
							$query = "Select * from category";
							$rows = queryMysql($query);
							foreach($rows as $r)
							{
						?> 
							<li><a style=" font-size: 20px; text-decoration: none;" href="detailpage.php?CatID=<?=$r['CatID']?>"><?=$r['CatName']?></a></li>
						<?php 
							}
						?>

					</div>
					<div class="sidebar_base" style="background-image:url(<?php echo 'images/side_base.png'?>)"></div>
 
		    </div>
	    </div>  
    	
	    

        <div class="sanphamchitiet">
			<?php
			if (isset($_GET['proid'])) {
				require_once('./dbconnector.php');
			
			$query = "Select * From product WHERE ProID =".$_GET['proid'];
			$rows = queryMysql($query);
			foreach ($rows as $r) { 
				?>
				<form action="">
				<div class="Chitietsanpham1">
                                    <div class="item">
                                        
                                        <<div class="col-sm-3">
                                            <img src="./images/products/<?= $r['ProImage'] ?>" alt="" class="img-responsive" style="width: 120px; height: 130px;">
                                                </div>
                                        
					</div>
					<div class="chitiet">	<br>Name: <?=$r['ProName']?> <br> 
                                                               
											Price: <?=$r['ProPrice']?> <br> <br>
                                                                                        Information: <?=$r['ProInfo']?> <br> <br>
                                                                                        <a href="khach.php"><input type="button" value="Back home" style=" background-color: 
											#8A6E3D; color:  #FFFFFF; width:40%; height: 30px; margin: 15px" ></a>
					</div>
				</div>
				</form>
				<?php
			}
			}
			
			?>
			
		</div>
		
		<div id="footer">
                    <p><b>Made by     </b><img style="width: 50px; height:50px ;" src="images/LOGOHTX.jpg" alt=""> <img style="width: 50px; height:50px ;  background-color:#FFFFFF" src="images/4.png" alt="">  <img style="width: 50px; height:50px ; background-color:#FFFFFF" src="images/2.png" alt=""></p>
            </div>
    </div>
</body>
</html>
