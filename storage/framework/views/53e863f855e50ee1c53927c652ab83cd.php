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
    <a href="<?php echo e(route('admin.laporan')); ?>">Laporan</a>
    <form action="<?php echo e(route('logout')); ?>" method="POST" class="mt-3 px-3">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger w-100">Logout</button>
    </form>
</div>

<div class="content">
    <h3><?php echo e($judul); ?></h3>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.mahasiswa.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" id="nim" value="<?php echo e(old('nim')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo e(old('nama')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" id="jurusan" value="<?php echo e(old('jurusan')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fakultas" class="form-label">Fakultas</label>
            <input type="text" name="fakultas" class="form-control" id="fakultas" value="<?php echo e(old('fakultas')); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('admin.mahasiswa')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\webpro2\Sistem Manajemen Data Mahasiswa\resources\views/admin/mahasiswa_create.blade.php ENDPATH**/ ?>