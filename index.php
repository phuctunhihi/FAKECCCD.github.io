<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function generateRandomCCCD() {
    $randomCCCD = '';
    // Đảm bảo số đầu tiên không bắt đầu bằng 0
    $randomCCCD .= rand(1, 9);
    // Tạo 11 số còn lại
    for ($i = 1; $i <= 11; $i++) {
        $randomCCCD .= rand(0, 9);
    }
    return $randomCCCD;
}
// Sử dụng hàm để tạo số CCCD ngẫu nhiên
$randomCCCD = generateRandomCCCD();
?>
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body><div class="container">
      <div class="justify-content-center">
          <div class="col-md-5">
              <div class="card">
          <div class="card-body">
                 <form action="" method="POST">
                                <div class="space-y-4">
<div class="mb-3">
  <label class="block text-sm font-medium mb-1" for="card-name">Họ và tên <span class="text-rose-500">*</span></label>
  <input id="card-name" class="form-control" type="text" required name="name" value="<?=$_POST['name']?>" placeholder="Ví dụ: Nguyễn Văn A">
</div>
<div class="mb-3">
  <label class="block text-sm font-medium mb-1" for="anhthe">Link ảnh thẻ <a href="tool-upload-lay-link" target="_blank">(<b>Click vào đây để upload ảnh lấy link</b></a>)</label>
  <input class="form-control" id="anhthe" type="text" placeholder="Ví dụ: https://linkanh.com/abc.jpg" value="<?=$_POST['anhthe']?>" required name="anhthe">
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="block text-sm font-medium mb-1" for="sex">Giới tính</label>
    <select id="sex" class="form-select" name="sex">
      <option value="Nam">Nam</option>
      <option value="Nữ">Nữ</option>
    </select>
  </div>
  <div class="col-md-6 mb-3">
    <label class="block text-sm font-medium mb-1" for="birthday">Ngày sinh</label>
    <input id="birthday" class="form-control" type="text" required name="birthday" value="<?=$_POST['birthday']?>" placeholder="Ví dụ: 12/12/2000">
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label class="block text-sm font-medium mb-1" for="socccd">Số CCCD</label>
    <input id="socccd" class="form-control" type="text" required name="socccd" value="<?=$randomCCCD?>" value="">
  </div>
  <div class="col-md-6 mb-3">
    <label class="block text-sm font-medium mb-1" for="quequan">Quê quán</label>
    <input id="quequan" class="form-control" type="text" required name="quequan" value="<?=$_POST['quequan']?>" placeholder="">
  </div>
</div>
<div class="mb-3">
  <label class="block text-sm font-medium mb-1" for="thuongtru">Địa chỉ thường trú</label>
  <input id="thuongtru" class="form-control" type="text" required name="thuongtru" value="<?=$_POST['thuongtru']?>" placeholder="">
</div>
<div class="mb-3">
  <label class="block text-sm font-medium mb-1" for="ngaycap">Ngày cấp</label>
  <input id="ngaycap" class="form-control" type="text" required name="ngaycap" value="<?=$_POST['ngaycap']?>" placeholder="">
</div>                 
                             <div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="submit">Tạo CCCD</button>
</div>
                                <!-- Email -->                       
                                  <?php         
                                 if(isset($_POST['name'])){
echo '<img class="w-full rounded w-100 mb-2" src="NguyenNhatDino/edit-image.php?name='.$_POST['name'].'&socccd='.$_POST['socccd'].'&birthday='.$_POST['birthday'].'&sex='.$_POST['sex'].'&quequan='.$_POST['quequan'].'&thuongtru='.$_POST['thuongtru'].'&ngaycap='.$_POST['ngaycap'].'&anhthe='.$_POST['anhthe'].'"/>';
echo '<img class="w-full rounded w-100 mb-2" src="NguyenNhatDino/mat-sau.php?name='.$_POST['name'].'&socccd='.$_POST['socccd'].'&birthday='.$_POST['birthday'].'&sex='.$_POST['sex'].'&quequan='.$_POST['quequan'].'&thuongtru='.$_POST['thuongtru'].'&ngaycap='.$_POST['ngaycap'].'&anhthe='.$_POST['anhthe'].'"/>';
}
                                 ?>
                            </div>
                            <!-- Form footer -->
                         </form>
          </div>
      </div>
          </div>
      </div>
  </div>            
                          <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>