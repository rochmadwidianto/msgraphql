
<?php if ($this->session->flashdata('alert')): $time = time();  ?>
	<script>
		var type      = '<?php echo $this->session->flashdata('alert-type') ?>';
		var message   = '<?php echo $this->session->flashdata('alert') ?>';

		alert.showSwal(type, message).click();
	</script>
<?php endif ?>

<script>
alert = {
	showSwal: function(type, txtMessage) {

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
            background: "#fff url(<?php echo $url->assets ?>samplyadmin/images/modal-bg.png)"
          })
        } else if (type == 'warning') {
          Swal.fire({
            icon: type,
            title: "Oops!",
            text: txtMessage,
            timer: 3000,
            showConfirmButton: !1,
            background: "#fff url(<?php echo $url->assets ?>samplyadmin/images/modal-bg.png)"
          })
        } else if (type == 'error') {
          Swal.fire({
            icon: type,
            title: "Gagal!",
            text: txtMessage,
            timer: 3000,
            showConfirmButton: !1,
            background: "#fff url(<?php echo $url->assets ?>samplyadmin/images/modal-bg.png)"
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
}
</script>