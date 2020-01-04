<?php
require_once './header.php';
require_once './restrictedsession.php';
$query = "SELECT CatID, CatName from category";
// exploit category
if(isset($_POST['keyword']))
    {
    $keyword = sanitizeString($_POST['keyword']);
    $query = $query . " WHERE CatID LIKE '%$keyword%' OR CatName LIKE '%$keyword%'";
}
$result = queryMysql($query);
$error = $msg = "";
if (!$result){
    $error = "I can't find this keywords, please try again.";
}
?>
<br><br>
<div>
    <form action="Cmanagement.php" method="post">
        Search batch:
        <input type="search" name="keyword"/>
        <input type="submit" value="Find"/>
    </form>
</div>
<br>
<table class="tbl" border="1px solid black" >
    <tr>
        <th>Category Name</th>
        <th>Category ID</th>
        <th>Options</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
        $CatName = $row[1];
        $CatID = $row[0];
        echo "<tr>";
        echo "<td>$CatName</td>";
        echo "<td>$CatID</td>";
        ?>
        <td>
            <form class="frminline" action="deletecat.php" method="post" onsubmit="return confirmDelete();">
                <input type="hidden" name="catid" value="<?php echo $row[0] ?>" />
                <input type="submit" value="Delete" />
            </form>
            <form class="frminline" action="editcat.php" method="post">
                <input type="hidden" name="catid" value="<?php echo $row[0] ?>" />
                <input type="submit" value="Update" />
            </form>
        </td>
        <?php
        echo "</tr>";
    }
    ?>
    <script>
        function confirmDelete() {
            var r = confirm("Are you sure you would like to delete ?");
            if (r) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</table>
</body>
</html>

