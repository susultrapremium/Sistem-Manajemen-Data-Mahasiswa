<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($judul); ?></title>
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
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="text-center">Sistem Manejemen Data Mahasiswa</h4>
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Tombol tambah mahasiswa -->
    <a href="<?php echo e(route('admin.mahasiswa.create')); ?>" class="btn btn-primary mb-3">
        Tambah Mahasiswa
    </a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($m->nim); ?></td>
                <td><?php echo e($m->nama); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.mahasiswa.edit', $m->id)); ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="<?php echo e(route('admin.mahasiswa.destroy', $m->id)); ?>"
                          method="POST"
                          style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\webpro2\Sistem Manajemen Data Mahasiswa\resources\views/admin/mahasiswa.blade.php ENDPATH**/ ?>