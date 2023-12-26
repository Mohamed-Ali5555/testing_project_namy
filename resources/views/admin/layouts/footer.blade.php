 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
     <div class="p-3">
         <h5>Title</h5>
         <p>Sidebar content</p>
     </div>
 </aside>
 <!-- /.control-sidebar -->

 <!-- Main Footer -->
 <footer class="main-footer">
     <!-- To the right -->
     <div class="float-right d-none d-sm-inline">
         Anything you want
     </div>
     <!-- Default to the left -->
     <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
 </footer>





 <!-- jQuery -->
 <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('backend/assets/dist/js/adminlte.min.js') }}"></script>
 {{-- // js general file thate i user to write code js     --}}
 <script src="{{ asset('backend/assets/generaljs/script.js') }}"></script>
@yield('scripts')

<script>
setTimeout(function(){
  $('#alert').slideUp();
},4000);

</script>