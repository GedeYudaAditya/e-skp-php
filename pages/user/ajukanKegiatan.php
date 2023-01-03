<?php
include 'layouts/header.php';
include 'layouts/slidebar.php';

include 'pages/user/auth/filter.php';

include 'pages/user/logic/logic.php';
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column inti">

    <!-- Main Content -->
    <div id="content">
        <?php
        include 'layouts/topbar.php';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid isinya">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ajukan Kegiatan</h1>
            </div>

            <div id="page">

                <form id="contact-form" action="" method="POST" enctype="multipart/form-data">

                    <div class="field-left">

                        <div class="form-title">Name :</div>
                        <input type="text" name="name" placeholder="Masukan Nama Anda" class="form-field" value="<?= $user['name'] ?>" readonly>

                        <div class="form-title">Jurusan :</div>
                        <input type="text" name="Jurusan" placeholder="Masukan Jurusan Anda" class="form-field" value="<?= $user['jurusan'] ?>" readonly>

                        <div class="form-title">Nama Kegiatan:</div>
                        <select name="event_id" id="" class="form-field mb-3">
                            <option selected>-- Pilih Kegiatan --</option>
                            <?php
                            $event = new Event();
                            $events = $event->all();
                            foreach ($events as $e) :
                            ?>
                                <option value="<?= $e['slug'] ?>"> <?= $e['name'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="field-right">

                        <div class="form-title">NIM :</div>
                        <input type="text" name="NIM" placeholder="Masukan NIM Anda" class="form-field" value="<?= $user['nim'] ?>" readonly>

                        <div class="form-title">Prodi :</div>
                        <input type="text" name="Prodi" placeholder="Masukan Prodi Anda" class="form-field" value="<?= $user['prodi'] ?>" readonly>

                        <div class="form-title">Sebagai :</div>
                        <input type="text" name="jabatan" placeholder="Masukan jabatan Anda" class="form-field" value="">

                    </div>


                    <div id="upload" class="modalku" data-state="0" data-ready="false">
                        <div class="modal__header">
                        </div>
                        <div class="modal__body">
                            <div class="modal__col">

                                <svg class="modal__icon modal__icon--blue" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
                                    <g fill="none" stroke="hsl(223,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
                                        <polyline class="modal__icon-sdo14" points="7 12 12 7 17 12" stroke-dasharray="14.2 14.2" />
                                        <line class="modal__icon-sdo10" x1="12" y1="7" x2="12" y2="17" stroke-dasharray="10 10" />
                                    </g>
                                </svg>

                                <svg class="modal__icon modal__icon--red" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
                                    <g fill="none" stroke="hsl(3,90%,50%)" stroke-width="2" stroke-linecap="round">
                                        <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
                                        <line class="modal__icon-sdo14" x1="7" y1="7" x2="17" y2="17" stroke-dasharray="14.2 14.2" />
                                        <line class="modal__icon-sdo14" x1="17" y1="7" x2="7" y2="17" stroke-dasharray="14.2 14.2" />
                                    </g>
                                </svg>

                                <svg class="modal__icon modal__icon--green" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true" display="none">
                                    <g fill="none" stroke="hsl(138,90%,50%)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle class="modal__icon-sdo69" cx="12" cy="12" r="11" stroke-dasharray="69.12 69.12" />
                                        <polyline class="modal__icon-sdo14" points="7 12.5 10 15.5 17 8.5" stroke-dasharray="14.2 14.2" />
                                    </g>
                                </svg>
                            </div>
                            <div class="modal__col">
                                <div class="modal__content">
                                    <h2 class="modal__title">Upload a File</h2>
                                    <p class="modal__message" style="color: #ffffff;">Select a file to upload from your computer</p>
                                    <div class="modal__actions">
                                        <button class="modal__button modal__button--upload" type="button" data-action="file">Choose File</button>
                                        <input id="file" type="file" name="file" hidden>
                                    </div>
                                    <div class="modal__actions" hidden>
                                        <svg class="modal__file-icon" viewBox="0 0 24 24" width="24px" height="24px" aria-hidden="true">
                                            <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polygon points="4 1 12 1 20 8 20 23 4 23" />
                                                <polyline points="12 1 12 8 20 8" />
                                            </g>
                                        </svg>
                                        <div class="modal__file" data-file></div>
                                        <button class="modal__close-button" type="button" data-action="fileReset">
                                            <svg class="modal__close-icon" viewBox="0 0 16 16" width="16px" height="16px" aria-hidden="true">
                                                <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <polyline points="4,4 12,12" />
                                                    <polyline points="12,4 4,12" />
                                                </g>
                                            </svg>
                                            <span class="modal__sr" style="color: #ffffff;">Remove</span>
                                        </button>
                                        <button class="modal__button" type="button" data-action="upload">Upload</button>
                                    </div>
                                </div>
                                <div class="modal__content" hidden>
                                    <h2 class="modal__title">Uploading…</h2>
                                    <p class="modal__message" style="color: #ffffff;">Just give us a moment to process your file.</p>
                                    <div class="modal__actions">
                                        <div class="modal__progress">
                                            <div class="modal__progress-value" data-progress-value>0%</div>
                                            <div class="modal__progress-bar">
                                                <div class="modal__progress-fill" data-progress-fill></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal__content" hidden>
                                    <h2 class="modal__title">Oops!</h2>
                                    <p class="modal__message" style="color: #ffffff;">Your file could not be uploaded due to an error. Try uploading it again?</p>
                                    <div class="modal__actions modal__actions--center">
                                        <button class="modal__button" type="button" data-action="upload">Retry</button>
                                        <button class="modal__button" type="button" data-action="cancel">Cancel</button>
                                    </div>
                                </div>
                                <div class="modal__content" hidden>
                                    <h2 class="modal__title">Upload Successful!</h2>
                                    <p class="modal__message" style="color: #ffffff;">Your file has been uploaded. You can copy the link to your clipboard.</p>
                                    <div class="modal__actions modal__actions--center">
                                        <button class="modal__button" type="button" data-action="copy">Copy Link</button>
                                        <button class="modal__button" type="button" data-action="cancel">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="buttons-container">
                        <input name="ajukan" type="submit" value="Kirim" class="buttons">
                    </div>

                    <!-- <a href="datapoinmhs.html">--Poin--</a>
            <a href="dashmhs.html">--Dasd--</a> -->

                </form>

                <!-- <script src="scriptup.js"></script> -->
                <script src="<?= asset('js/user/scriptup.js') ?>"></script>


            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright @2022</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>

<?php
include 'layouts/bottom.php';
?>