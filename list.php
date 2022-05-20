<?php
$sql_list ="SELECT * FROM `student` WHERE 1";
$list = (mysqli_query($conn, $sql_list));

?>
<div class="container mt-3"id="list">
    <h2>Danh Sách các sinh viên</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Giới Tính</th>
                <th>Lớp</th>
                <th>Điểm Trung Bình</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = $list->fetch_assoc()) {

            
            ?>
            <tr>
            <th><?=$row['id']?></th>
                <th><?=$row['name']?></th>
                <th><?=$row['age']?></th>
                <th><?=$row['sex']?></th>
                <th><?=$row['class']?></th>
                <th><?=$row['score']?></th>
            </tr>
            <?php 
            }?>
        </tbody>
    </table>
</div>