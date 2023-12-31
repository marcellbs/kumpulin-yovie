<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <!-- <li class="breadcrumb-item">Tables</li> -->
                <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col">
                <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Data Pengguna Kumpulin</h5>
                        <!-- <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalEdit" onclick="location.href='<?= site_url('AdminController/login') ?>'">Tambah Data</button> -->
                        <button type="button" class="btn btn-primary mb-4" onclick="location.href='<?= site_url('Dashboard/dataPengguna') ?>'">Tambah Data</button>

                        <a href=""></a>



                        <!-- Default Table -->
                        <table id="datatable" class="datatable mt-2" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $user) {
                                    // var_dump($user);
                                ?>
                                    <tr>
                                        <td><?php echo $user['id_user']; ?></td>
                                        <td><?php echo $user['username']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td><?php echo $user['no_telp']; ?></td>
                                        <td><?php echo $user['alamat']; ?></td>
                                        <!-- <td scope="col">Edit | Delete</td> -->
                                        <td>
                                            <!-- Modal Detail-->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail<?php echo $user['id_user']; ?>">Detail</button>
                                            <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button> -->

                                            <div class="modal fade" id="modalDetail<?php echo $user['id_user']; ?>" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetailLabel">Detail Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>No.</td>
                                                                    <td>: <?php echo $user['id_user']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Pengguna</td>
                                                                    <td>: <?php echo $user['username']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td>: <?php echo $user['email']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>No. Telp</td>
                                                                    <td>: <?php echo $user['no_telp']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>: <?php echo $user['alamat']; ?></td>
                                                                </tr>

                                                            </table>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?php echo $user['id_user']; ?>">Edit</button>
                                                                <button type="button" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Modal Detail END-->

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <form class="row g-3" method="post" action="<?= base_url('/dashboard/save'); ?>" id="datauser">
                <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditLabel">Tambah Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- <input type="hidden" class="form-control" placeholder="" name="id_user" id="id_user" value=""> -->
                                <!-- <input type="hidden" class="form-control" placeholder="" name="id_jemput" id="id_jemput" value=""> -->
                                <div class="col-12">
                                    <label class="form-label">Nama Penguna</label>
                                    <!-- <input type="text" class="form-control" placeholder="" name="username" id="username" value=""> -->
                                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="<?= set_value('username') ?>">
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <!-- <input type="text" class="form-control" placeholder="" name="alamat" id="alamat" value=""> -->
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" value="<?= set_value('email') ?>">

                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">No. Telp</label>
                                    <!-- <input type="date" class="form-control" placeholder="" name="tgl_jemput" id="tgl_jemput" value=""> -->
                                    <input type="text" class="form-control" placeholder="No. Telp" name="no_telp" id="no_telp" value="<?= set_value('no_telp') ?>">

                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'no_telp') : '' ?></span>
                                </div>
                                <!-- <div class="col-12">
                                                <label class="form-label">Sesi</label>
                                                <select class="form-control" placeholder="" name="sesi" id="sesi" value="">
                                                    <option value="Sesi 1: 08.00 - 10.00" >Sesi 1: 08.00 - 10.00</option>
                                                    <option value="Sesi 2: 10.00 - 12.00" >Sesi 2: 10.00 - 12.00</option>
                                                    <option value="Sesi 3: 14.00 - 16.30" >Sesi 3: 14.00 - 16.30</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div> -->
                                <div class="col-12">
                                    <label class="form-label">Alamat</label>
                                    <!-- <input type="number" class="form-control" placeholder="" name="botol" id="botol" value=""> -->
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" value="<?= set_value('alamat') ?>">

                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <!-- <input type="number" class="form-control" placeholder="" name="karton" id="karton" value=""> -->
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="<?= set_value('password') ?>" autocomplete="off">

                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Ulangi Password</label>
                                    <!-- <input type="number" class="form-control" placeholder="" name="kaleng" id="kaleng" value=""> -->
                                    <input type="password" class="form-control" placeholder="Ulangi Password" name="pass_confirm" id="password" value="<?= set_value('pass_confirm') ?>" autocomplete="off">

                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pass_confirm') : '' ?></span>
                                </div>
                                <!-- <div class="col-12">
                                                <label class="form-label">Jerigen *Kg</label>
                                                <input type="number" class="form-control" placeholder="" name="jerigen" id="jerigen" value="">
                                                <span class="text-danger"></span>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label">Poin</label>
                                                <input type="number" class="form-control" placeholder="" name="poin" id="poin" value="">
                                                <span class="text-danger"></span>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Status</label>
                                                <select class="form-control" placeholder="" name="status" id="status" value="">
                                                    <option value="Diproses" >Diproses</option>
                                                    <option value="Diambil" >Telah diambil</option>
                                                    <option value="Ditukar" >Poin ditukar</option>
                                                    <option value="Ditolak" >Ditolak, Ajukan dengan tanggal/sesi berbeda</option>
                                                </select>
                                                <span class="text-danger"></span>
                                            </div> -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetail">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Modal Edit END -->


    </section>
</main>

<?= $this->endSection() ?>