<!-- for sweet alert -->
<script>
function showSwal(type, txtMessage) {

  !function(showSwal){
    "use strict";
    function e(){}e.prototype.init=function(){
      if (type == 'success') {
        Swal.fire({
          icon: type,
          title: "Sukses",
          text: txtMessage,
          timer: 3000,
          showConfirmButton: !1,
          background: "#fff url(<?php echo $assets ?>samplyadmin/images/modal-bg.png)"
        })
      } else if (type == 'warning') {
        Swal.fire({
          icon: type,
          title: "Oops!",
          text: txtMessage,
          timer: 3000,
          showConfirmButton: !1,
          background: "#fff url(<?php echo $assets ?>samplyadmin/images/modal-bg.png)"
        })
      } else if (type == 'error') {
        Swal.fire({
          icon: type,
          title: "Gagal!",
          text: txtMessage,
          timer: 3000,
          showConfirmButton: !1,
          background: "#fff url(<?php echo $assets ?>samplyadmin/images/modal-bg.png)"
        })
      }
    },
    showSwal.SweetAlert=new e,
    showSwal.SweetAlert.Constructor=e
  }(window.jQuery),
  function(){
    "use strict";
    window.jQuery.SweetAlert.init()
  }();
}
</script>

<?php if(!is_null($msg_message)): ?>
  <script>
    var msg_type    = '<?php echo $msg_type ?>';
    var msg_message = '<?php echo $msg_message ?>';

    showSwal(msg_type, msg_message);

    setTimeout('refreshPage()', 3500);
    function refreshPage() { 
        window.location.href = "<?php echo url('login') ?>";
    }
  </script>
<?php endif; ?>
<!-- end - for sweet alert -->