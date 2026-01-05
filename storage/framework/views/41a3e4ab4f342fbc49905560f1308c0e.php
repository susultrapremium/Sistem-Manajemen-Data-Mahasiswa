<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($judul); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .sidebar { height: 100vh; position: fixed; top: 0; left: 0; width: 250px; background-color: #343a40; color: #fff; padding-top: 20px; }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 20px; transition: background 0.3s; }
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center">Sistem Manajemen Data Mahasiswa</h4>
        <hr class="text-white">
        <a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
        <a href="<?php echo e(route('admin.mahasiswa')); ?>">Mahasiswa</a>
        <a href="<?php echo e(route('admin.laporan')); ?>">laporan</a>
        <form action="<?php echo e(route('logout')); ?>" method="POST" class="mt-3 px-3">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <div class="content">
        <h3><?php echo e($judul); ?></h3>

        <form action="<?php echo e(route('admin.mahasiswa.update', $mahasiswa->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" id="nim" value="<?php echo e($mahasiswa->nim); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo e($mahasiswa->nama); ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" <?php echo e($mahasiswa->status == 1 ? 'selected' : ''); ?>>Aktif</option>
                    <option value="0" <?php echo e($mahasiswa->status == 0 ? 'selected' : ''); ?>>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?php echo e(route('admin.mahasiswa')); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\webpro2\Sistem Manajemen Data Mahasiswa\resources\views/admin/mahasiswa_edit.blade.php ENDPATH**/ ?>