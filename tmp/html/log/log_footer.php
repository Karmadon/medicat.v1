<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    
    
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/t/bs-3.3.6/jq-2.2.0,dt-1.10.11,af-2.1.1,cr-1.3.1,fc-3.2.1,fh-3.1.1,kt-2.1.1,r-2.0.2,rr-1.1.1,sc-1.4.1,se-1.1.2/datatables.min.js"></script>




<script>
$(function () {
    $('#example22').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example22 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="datatable_input_search" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example22').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
$("#example22 tfoot tr th:last").remove();	
	} );
	
	
	$(function () {
    $('#example23').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example23 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="datatable_input_search" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example23').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
$("#example23 tfoot tr th:last").remove();	
	} );
	
	
		$(function () {
    $('#example24').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example24 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="datatable_input_search" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example24').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
$("#example24 tfoot tr th:last").remove();	
	} );
	
	
$(function () {
    $('#example25').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example25 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input class="datatable_input_search" type="text" placeholder="'+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example25').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
$("#example25 tfoot tr th:last").remove();	
	} );
 </script>
</body>
</html>