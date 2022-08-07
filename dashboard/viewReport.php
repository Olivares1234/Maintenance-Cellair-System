
<?php 

require_once("controllerClass.php");
$data = new controllerClass();
$id = $_GET['id'];
$data->setId($id);

if(isset($_GET['edit'])){
    $data->getname($_POST['name']);
    $data->getcompany($_POST['company']);
    $data->getdepartment($_POST['department']);

    echo $data->update();
    echo "<script>alert('data updated successfully');document.location='allData.php'</script>";
}
$record = $data->fetchOne();

$val=$record[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Print Report</title>
    <link href="assets/img/logo/repair.png" rel="icon">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/report.css">
    <style>
        table.table-bordered{
    /* border:1px solid #333; */
    margin-top:20px;
    
   
  }
table.table-bordered > thead > tr > th{
    /* border:2px solid #333;
    border:1px ; */
   
}
table.table-bordered > tbody > tr > td{
    /* border: 1px #333 solid; */
    text-align:center;
    word-wrap: break-all;
    padding: auto;

}

.signature {
    border: 0;
    border-bottom: 1px solid #000;
}
input {
text-align: center;
color: #757575;
}
    </style>
</head>
<body>
    <div class="container">

    <table class="body-wrap">
        <tbody><tr>
            <td></td>
            <td class="container" width="100">
                <div class="content">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                        <tbody><tr style="border: 1px #333 solid">
                            <td class="content-wrap aligncenter">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody><tr>
                                        <td class="content-block">
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                    <b><h2>Maintenance Request Form</h2></b>
                                        <td class="content-block" >
                                   
                                            <table class="table align-items-center  display responsive nowrap" style="border: 1px #333 solid;">
                                                <tbody style="border: 1px #333 solid;">
                                                <tr><td style="border: 1px #333 solid;"><b>RsNo.:</b>&nbsp;<?php echo $val['id'];?></td><br>
                                                <td style="border: 1px #333 solid;"><b>Date Request:</b>&nbsp;<?php echo $val['date_request'];?><br></td></tr>
                                                    <tr><td style="border: 1px #333 solid;"><b>Name:</b>&nbsp;<?php echo $val['name'];?></td><br>
                                                    <td rowspan="2"  style="border: 1px #333 solid; text-align:left;word-wrap: break-word;min-width: 160px;max-width: 160px;"><b>Remarks:</b>&nbsp;<?php echo $val['remarks'];?></td><br>
                                                    <tr><td style="border: 1px #333 solid;"><b>Company:</b>&nbsp;<?php echo $val['company'];?></td><br></tr>
                                                <tr><td style="border: 1px #333 solid;"><b>Department:</b>&nbsp;<?php echo $val['department'];?></td><br>
                                                <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                              
                                            <div style="padding-top:100px;"></div>
                                            <div style="float:left;">
                                            Requested By:
                                            <input type="text" class="signature" value="<?php echo $val['name'];?>"/>
                                            <div style="padding-left:140px;">signature over <br>printed name</div><br>
                                            </div>
                                            <div style="float:right;";>
                                            Received By:
                                            <input type="text" class="signature" value="Junrey"/>
                                            <div style="padding-left:120px;">signature over <br>printed name</div><br>
                                            </div>
                                    </tr>
                                </tbody></table>
                                <div class="footer">
                                    <table width="100%">
                                        <tbody><tr>
                                        
                                        </tr>
                                    </tbody></table>
                                </div></div>
                        </td>
                        <td></td>
                    </tr>
                </tbody></table>
                </div>
</body>
</html>



