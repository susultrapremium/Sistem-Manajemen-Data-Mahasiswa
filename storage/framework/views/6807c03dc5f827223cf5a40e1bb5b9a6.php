<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($judul ?? 'Daftar Laporan Mahasiswa'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding-top: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            transition: background 0.3s;
        }
        .sidebar a:hover { background-color: #495057; }
        .content { margin-left: 250px; padding: 20px; }
        table th { background-color: #f4f4f4; }
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
    <h3><?php echo e($judul ?? 'Daftar Laporan Mahasiswa'); ?></h3>

    <!-- ✅ TOMBOL TAMBAH LAPORAN -->
    <a href="<?php echo e(route('admin.laporan.create')); ?>" class="btn btn-primary mb-3">
        + Tambah Laporan
    </a>

    <!-- Alert sukses -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Isi Laporan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($l->mahasiswa->nama); ?></td>
                <td><?php echo e($l->mahasiswa->nim); ?></td>
                <td><?php echo e($l->isi_laporan); ?></td>
                <td><?php echo e($l->tanggal); ?></td>
                <td><?php echo e(ucfirst($l->status)); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.laporan.edit', $l->id)); ?>"
                       class="btn btn-sm btn-warning">
                        Ubah Status
                    </a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7" class="text-center">Belum ada laporan</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Jalaluddin\Desktop\Sistem Manajemen Data Mahasiswa\resources\views/admin/laporan.blade.php ENDPATH**/ ?>