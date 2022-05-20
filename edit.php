<?php
$sql_list ="SELECT * FROM `student` WHERE 1";
$list = (mysqli_query($conn, $sql_list));
?>
<div class="container mt-3"id="edit">
    <h2>Sửa Sinh Viên</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Giới Tính</th>
                <th>Lớp</th>
                <th>Điểm Trung Bình</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = $list->fetch_assoc()) { // Truy xuat csdl in ds sinh vien ra bang

            
            ?>
            <tr>
            <th class="id_index"><?=$row['id']?></th>
                <th class="name_index"><?=$row['name']?></th>
                <th class="age_index" ><?=$row['age']?></th>
                <th class="sex_index" ><?=$row['sex']?></th>
                <th class="class_index" ><?=$row['class']?></th>
                <th class="score_index" ><?=$row['score']?></th>
                <th><a href="?delete_id=<?=$row['id']?>#edit"><button class="btn btn-danger">Xóa</button></a></th>
                <th><button class="btn btn-primary edit_btn" >Sửa</button></th>
            </tr>
            <?php 
            }
           ?>
        </tbody>
    </table>
    <form action="" method="post" id = "add" class=" bg-secondary container was-validated p-2">
    <div class="modall"  id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> 
    <div class="modal-dialog" role="document">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Form sửa thông tin</h5>
        <button type="button" class="close closee" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="mb-3 mt-3 ">
        <label for="name_edit" class="form-label">Họ và tên:</label>
        <input type="text" class="form-control" id="name_edit" index="name_edit" placeholder="Nhập tên" name="name_edit" required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="age_edit" class="form-label">Tuổi:</label>
        <input type="number" class="form-control" id="age_edit" placeholder="Nhập tuổi" name="age_edit" required>
    </div>

    <div class="mb-3 mt-3 ">
        <p for="sex_edit" class="form-label">Giới tính:</p>
        <input type="radio" id="nam_edit" class="form-check-input" value = "Nam"  name="sex_edit" required>
        <label for="nam" class="me-5">Nam</label>
        <input type="radio" id="nu_edit" class="form-check-input" value = "Nữ"  name="sex_edit" required>
        <label for="nu">Nữ</label>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="id_edit" class="form-label">Mã sinh viên:</label>
        <input style="display:none;" type="text" class="form-control" id="id_edit" placeholder="Nhập mã sinh viên"  name="id_edit" required>
        <input type="text" class="form-control" id="id_edit_x" placeholder="Nhập mã sinh viên" disabled required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="class_edit" class="form-label">Lớp theo học </label>
        <input type="text" class="form-control" id="class_edit" placeholder="Nhập lớp" name="class_edit" required>
    </div>

    <div class="mb-3 mt-3 ">
        <label for="score_edit" class="form-label">Điểm trung bình:</label>
        <input type="number" class="form-control" id="score_edit" placeholder="Nhập điểm trung bình" name="score_edit" required>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closee" data-dismiss="modal">Close</button>
        <div class=
        "mb-3 mt-3 d-flex justify-content-center"> <button type="submit" class="btn btn-primary " name="submit_edit">Cập nhật</button></div>
      </div>
    </div>
  </div>
</div>
</form>
</div>
