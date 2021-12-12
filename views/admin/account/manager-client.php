<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách thành viên</h2>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <hr>

        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">id</th>
                        <th>Tên tài khoản</th>
                        <th class="col-lg-2">Email</th>
                        <th>Số dư</th>
                        <th>Trạng thái</th>
                        <th>Loại tài khoản</th>
                        <th>Ngày tham gia</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ds_client as $index => $key) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['email'] ?></td>
                            <td><?php echo number_format($key['balance'], 0, '', '.'); ?>đ</td>
                            <td><?php if ($key['status'] == 0) {
                                    echo "Khóa";
                                } else if ($key['status'] == 1) {
                                    echo "Hoạt động";
                                } ?></td>
                            <td><?php if ($key['permission'] == 2) {
                                    echo "Thành viên";
                                } ?></td>
                            <td><?= $key['create_at'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= ADMIN_URL . 'edit-client?id=' . $key['id'] ?>">Sửa</a>
                                <a onclick="confrim_remove('<?= ADMIN_URL . 'delete-client?id=' . $key['id'] ?>'
                                ,'<?= $key['username'] ?>')" href="javascript:;"
                                 class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php for ($i = 1; $i <= $pagea; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="manager-client?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>