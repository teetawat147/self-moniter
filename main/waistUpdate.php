<?php
    include('../include/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลรายละเอียดของรอบเอว</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

    <?php
        $sql = "select * from `waist` WHERE waistId=".$_GET['waistId'];
        $result = $conn -> prepare($sql);
        $result -> execute();
        $rowsWaist = $result -> fetch(PDO::FETCH_ASSOC);
    ?>
    
<body>
<?php
      include "./header.php";
?>
    <div class="container mt-3">
        <h3>แก้ไข ระดับรอบเอว</h3>
        <form action="ajaxWaistUpdate.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistName">รายการ</label>
                    <input id="waistName" class="form-control" name="waistName" type="text" value="<?php echo htmlspecialchars_decode($rowsWaist['waistName']); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="sex1max">เกณฑ์ของผู้ชาย</label>
                    <input id="sex1max" class="form-control" name="sex1max" type="text" value="<?php echo $rowsWaist['sex1max']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="sex2max">เกณฑ์ของผู้หญิง</label>
                    <input id="sex2max" name="sex2max"  type="text" class="form-control"  value="<?php echo $rowsWaist['sex2max']; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistConclude">สรุป</label>
                    <textarea name="waistConclude" id="waistConclude" class="form-control" cols="80" rows="10"><?php echo htmlspecialchars_decode($rowsWaist['waistConclude']); ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistDetail">รายละเอียด</label>
                    <input id="waistDetail" class="form-control" name="waistDetail" class="ckeditor" type="text" value="<?php echo htmlspecialchars_decode($rowsWaist['waistDetail']); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="waistAdvice">คำแนะนำ</label>
                    <textarea name="waistAdvice" id="waistAdvice" class="ckeditor" cols="80" rows="10"><?php echo htmlspecialchars_decode($rowsWaist['waistAdvice']); ?></textarea>
                </div>
            </div>
            <input type="hidden" name="waistId" id="waistId" value="<?php echo $rowsWaist['waistId']; ?>">
            <center>
                <button class="btn btn-warning mr-3" type="reset">ยกเลิก</button>
                <button class="btn btn-success " type="submit">บันทึก</button>
            </center>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script src="../js/tableToCards.js"></script>

    <script>
            function createCkeditor(element) {
                ClassicEditor
                .create( document.getElementById(element) )
                .catch( error => {
                    console.error( error );
                } );
            }

            createCkeditor("waistConclude");
            createCkeditor("waistAdvice");
    </script>


</body>
</html>
