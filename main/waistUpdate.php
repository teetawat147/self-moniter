<?php
    include('../include/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลรายละเอียดของรอบเอว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        .container {
            margin-top: 20px;
            padding: 5px;
            text-align: center;
        }
        
        .form-group, label {
            margin: 15px 0;
        }
    </style>
</head>

    <?php
        $sql="select * from `waist` WHERE waistId=".$_GET['waistId'];
        $obj=$conn->prepare($sql);
        $obj->execute();
        $rowsWaist=$obj->fetch(PDO::FETCH_ASSOC);
    ?>
    
<body>
    <div class="container">
        <form action="ajaxWaistUpdate.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistName"><b>รายการ</b></label><br>
                    <textarea name="waistName" id="waistName" cols="80" rows="10"><?php echo htmlentities($rowsWaist['waistName']); ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="sex1max"><b>เกณฑ์ของผู้ชาย</b></label><br>
                    <textarea name="sex1max" id="sex1max" cols="80" rows="10"><?php echo $rowsWaist['sex1max']; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="sex2max"><b>เกณฑ์ของผู้หญิง</b></label><br>
                    <textarea name="sex2max" id="sex2max" cols="80" rows="10"><?php echo $rowsWaist['sex2max']; ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistConclude"><b>สรุป</b></label><br>
                    <textarea name="waistConclude" id="waistConclude" cols="80" rows="10"><?php echo htmlentities($rowsWaist['waistConclude']); ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistDetail"><b>รายละเอียด</b></label><br>
                    <textarea name="waistDetail" id="waistDetail" cols="80" rows="10"><?php echo htmlentities($rowsWaist['waistDetail']); ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistAdvice"><b>คำแนะนำ</b></label><br>
                    <textarea name="waistAdvice" id="waistAdvice" cols="80" rows="10"><?php echo htmlentities($rowsWaist['waistAdvice']); ?></textarea>
                </div>
            </div>
            <input type="hidden" name="waistId" id="waistId" value="<?php echo htmlentities($rowsWaist['waistId']); ?>">
            <button type="submit">บันทึก</button>
        </form>
    </div>
    <!-- <script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="../js/tableToCards.js"></script>
    <!-- </script> -->
    <script>
            function createCkeditor(element) {
                ClassicEditor
                .create( document.getElementById(element) )
                .catch( error => {
                    console.error( error );
                } );
            }

            createCkeditor("waistName");
            createCkeditor("waistDetail");
            createCkeditor("waistConclude");
            createCkeditor("sex1max");
            createCkeditor("sex2max");
            createCkeditor("waistAdvice");
    </script>


</body>
</html>
