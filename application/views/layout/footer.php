<section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2018 Aplikasi Manajemen Klinik
                </div>

            </div>
        </div>
    </section>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="<?php echo base_url();?>assets/js/dataTables/jquery.dataTables.js"></script>
    
   <script type="text/javascript">
        $(document).ready( function () {
            $('#mydata').dataTable();
        });
   </script>
   <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker({
                viewMode: 'years',
                format: 'YYYY/MM/DD'
            });
            $('#datetimepicker5').datetimepicker({
                format: 'YYYY-MM-DD HH:MM:SS'
            });
        });
    </script>