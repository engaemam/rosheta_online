<footer class="footer no-print">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12">Copyrights© 2018 <span class="d-none d-sm-inline-block"> Rosheta-Online </span></div>
            </div>
         </div>
      </footer>
      <!-- End Footer --><!-- jQuery  -->
      <script src="/assets/js/jquery.min.js"></script><script src="/assets/js/bootstrap.bundle.min.js"></script><script src="/assets/js/modernizr.min.js"></script><script src="/assets/js/detect.js"></script><script src="/assets/js/fastclick.js"></script><script src="/assets/js/jquery.slimscroll.js"></script><script src="/assets/js/jquery.blockUI.js"></script><script src="/assets/js/waves.js"></script><!-- Required datatable js --><script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script><script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script><!-- Buttons examples --><script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script><script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script><script src="/assets/plugins/datatables/jszip.min.js"></script><script src="/assets/plugins/datatables/pdfmake.min.js"></script><script src="/assets/plugins/datatables/vfs_fonts.js"></script><script src="/assets/plugins/datatables/buttons.html5.min.js"></script><script src="/assets/plugins/datatables/buttons.print.min.js"></script><script src="/assets/plugins/datatables/buttons.colVis.min.js"></script><!-- Responsive examples --><script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script><script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script><!-- Datatable init js --><script src="/assets/pages/datatables.init.js"></script><!-- App js --><script src="/assets/js/app.js"></script>

      <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').length + 1;
        
        $('#addScnt').on('click', function() {
                $('<p><label><i class="col-form-label"></i> Item ' + i +':</label><input type="text" id="p_scnt" name="p_scnt_' + i +'" value="" class="form-control" placeholder="another item"></p>').appendTo(scntDiv);
                document.getElementById('p_scnt_no').value=i;
                i++;
                
                
                return false;
        });
        
});
    </script>
   </body>
   <!-- Mirrored from themesdesign.in/drixo/horizontal-green/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 12 Jan 2019 00:35:50 GMT -->
</html>