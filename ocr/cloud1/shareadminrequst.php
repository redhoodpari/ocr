<?php
error_reporting(0);
session_start();
ob_start();
include './IConstat.php';
include './MySql.php';
$query = "SELECT *, `sharefileaccess`.txtId as txtUId FROM `sharefileaccess`, pregistration where pregistration.txtId = sharefileaccess.vendorId ORDER BY `sharefileaccess`.`txtId` ASC ";
MysqlConnection::connect();
$resource = MysqlConnection::executeQuery($query);
$result = MysqlConnection::toArrays($resource);
?>
<html>
    <head>
        <link href="../css/style.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <div id="search"><img src="../images/cloude4.jpg" width="250px;" height="100px;" style="margin: 4px 4px 4px 4px"></div>
            <div style="clear: both"></div>
            <div style="text-align: left;background-color:#525E6A;"><span><?php include './leftmenu.php'; ?></span></div>
            <div id="slider" style="height: 250px;"><?php include './slider.php'; ?></div>
            <div style="clear: both"></div>
            <div style="widows: 99%;font-size: 13px;line-height: 20px;">
                <!------------------------- START CODE FROM HERE  ------------------------------->
                <div style="padding: 10px;width: 98%;">
                    <br/>
                    <center>
                        <p style="line-height: 20px;">
                        <h4>COLLABORATION IN MULTICLOUD COMPUTING ENVIRONMENTS</h4>
                        <br>
                        <div style="width: 95%;float: right;margin-right: 30px;">
                            <table border="1" style="border-collapse: collapse;width: 100%;font-family: verdana;font-size: 13px;">
                                <tr id="tr" style="text-align: center">
                                    <th id="th">#</th>
                                    <th id="th">FULL NAME</th>
                                    <th id="th">FILE NAME</th>
                                    <th id="th">REQUEST ID</th>
                                    <th id="th">APPROVE</th>
                                    <th id="th">IS APPROVE</th>
                                    <th id="th">KEY</th>
                                </tr>
                                <?php
                                $srno = 1;
                                foreach ($result as $value) {
                                    ?>
                                    <tr id="tr"  style="text-align: center">
                                        <td style="width: 25px;"><?php echo $srno++ ?></td>   
                                        <td><?php echo $value["full_name"] ?></td>   
                                        <td><?php echo $value["filename"]; ?></td>   
                                        <td><?php echo $value["requestId"] ?></td>   
                                        <td>
                                            <a href="chooseuser.php?txtId=<?php echo $value["txtUId"] ?>&vendorId=<?php echo $value["vendorId"] ?>&fullName=<?php echo $value["full_name"] ?>&filename=<?php echo $value["filename"] ?>&email_id=<?php echo $value["email_id"] ?>" style="color: blue;font-size: 11px;;font-weight: normal">
                                                GRANT ACCESS
                                            </a>
                                        </td>   
                                        <td><?php echo $value["hasAccess"] ?></td>   
                                        <td><?php echo $value["master"] ?></td>   
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>

                    </center>
                </div>
                <div style="clear: both"></div>
                <!------------------------- START CODE FROM HERE  ------------------------------->



            </div>
            <div style="clear: both"></div>
            <br/><br/>
            <div id="footer">
                <center>
                    <p style="padding: 5px;color: white">
                        <?php include './footer.php'; ?>
                    </p>
                </center>
            </div>
        </div>
    </body>
</html>




