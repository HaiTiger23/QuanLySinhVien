<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./css/nav_main.css">
  <link rel="stylesheet" href="./css/edit.css">
  <link rel="stylesheet" href="./css/Notification.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
<?php
include 'databaseconnect.php';
class people {
    public $name;
    public $age;
    public $sex;
    public function __construct($name, $age, $sex) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
    }
}
class Student extends People {
    public $id;
    public $class;
    public $scores;
    public function __construct($name, $age, $sex, $id, $class,$scores) {
        $this->name = $name;
        $this->age = $age;
        $this->sex = $sex;
        $this->id = $id;
        $this->class = $class;
        $this->scores = $scores;
    }

}
if(isset($_GET['delete_id'])) {
$sql_delete = "DELETE FROM `student` WHERE id = '".$_GET['delete_id']."'";
if(mysqli_query($conn, $sql_delete)){
    header("Location: /BaiTap/index.php?check=1");
}else {
    echo "Loi";
}
}
if(isset($_GET['check'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show ThongBao">
    <strong>Thông báo</strong> Xóa Thành công
  </div>
  
    <?php
}
if(isset($_GET['check_edit'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show ThongBao">
    <strong>Thông báo</strong> Cập Nhật Thành công
  </div>
  
    <?php
}
?>
    <p class ="text-center h1 abbr pt-2" text-center><abbr title="Phần Mềm Quản Lý Của HTG">Quản lý Sinh Viên</abbr></p>
    <div class="nav">
        <a class="nav_item" href="#add"><i class="fa-solid fa-plus"></i></a>
        <a class="nav_item" href="#list"><i class="fa-solid fa-list-ol"></i></a>
        <a class="nav_item" href="#edit"><i class="fa-solid fa-pen-to-square"></i></a>
    </div>
    <form action="" method="post" id = "add" class=" bg-secondary container was-validated p-2">
    <div class="mb-3 mt-3 ">
        <label for="name" class="form-label">Họ và tên:</label>
        <input type="text" class="form-control" id="name" placeholder="Nhập tên" name="name" required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="age" class="form-label">Tuổi:</label>
        <input type="number" class="form-control" id="age" placeholder="Nhập tuổi" name="age" required>
    </div>

    <div class="mb-3 mt-3 ">
        <p for="sex" class="form-label">Giới tính:</p>
        <input type="radio" id="nam" class="form-check-input" value = "Nam"  name="sex" required>
        <label for="nam" class="me-5">Nam</label>
        <input type="radio" id="nu" class="form-check-input" value = "Nữ"  name="sex" required>
        <label for="nu">Nữ</label>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="id" class="form-label">Mã sinh viên:</label>
        <input type="text" class="form-control" id="id" placeholder="Nhập mã sinh viên" name="id" required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="class" class="form-label">Lớp theo học </label>
        <input type="text" class="form-control" id="class" placeholder="Nhập lớp" name="class" required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="score" class="form-label">Điểm trung bình:</label>
        <input type="number" class="form-control" id="sore" placeholder="Nhập điểm trung bình" name="score" required>
    </div>
    <div class="mb-3 mt-3 d-flex justify-content-center"> <button type="submit" class="btn btn-primary " name="submit">Submit</button></div>
    </form>
    <?php
    
    if(isset($_POST['submit'])) {
        $sv = new Student($_POST['name'],$_POST['age'],$_POST['sex'],$_POST['id'],$_POST['class'],$_POST['score']);
        $sql =  "INSERT INTO `student`(`id`, `name`, `age`, `sex`, `class`, `score`) VALUES ('$sv->id','$sv->name','$sv->age','$sv->sex','$sv->class','$sv->scores')";
        //echo $sql;
        $get_id = "SELECT id FROM `student` WHERE id = '$sv->id'";
        $list_id = mysqli_query($conn, $get_id);
    if(mysqli_query($conn, $sql) && !($list_id->num_rows > 0)) {
        ?>
       <div class="alert alert-success ThongBao">
    <strong>Thông báo</strong> Thêm Thành Công
  </div>
        <?php
    }else {
         ?>
         <div class="alert alert-warning ThongBao">
    <strong>Thông báo</strong> Thêm thất bại
  </div>
        <?php
    }
    }
// Cap nhat sinh vien vao csdl
if(isset($_POST['submit_edit'])) {
    $sv_edit = new Student($_POST['name_edit'],$_POST['age_edit'],$_POST['sex_edit'],$_POST['id_edit'],$_POST['class_edit'],$_POST['score_edit']);
    $sql =  "UPDATE  `student` SET `name` = '$sv_edit->name', `age`='$sv_edit->age', `sex` = '$sv_edit->sex', `class` = '$sv_edit->class', `score` = '$sv_edit->scores' WHERE `id` = '$sv_edit->id'";
      if(mysqli_query($conn, $sql)) {
          ?>
         <div class="alert alert-success ThongBao">
      <strong>Thông báo</strong> Cập Nhật Thành Công
    </div>
          <?php
      }else {
  
           ?>
           <div class="alert alert-warning ThongBao">
      <strong>Thông báo</strong> Cập Nhật thất bại
    </div>
          <?php
      }
    }
    include "list.php";
    include "edit.php";
 ?>
</body>
<script src="./js/nav.js"></script>
<script src="./js/edit.js"></script>
</html>