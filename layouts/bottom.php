</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <form action="" method="POST">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= BASE_URL ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASE_URL ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASE_URL ?>/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= BASE_URL ?>/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= BASE_URL ?>/js/demo/chart-area-demo.js"></script>
<script src="<?= BASE_URL ?>/js/demo/chart-pie-demo.js"></script>

<!-- clound datatable -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>


</body>

</html>