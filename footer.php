<!-- footer area start-->
<footer>
    <div class="footer-area text-justify">
        <p>© Copyright 2019-2020. All right reserved || <a href="">CV. Sumber Bahagia</a>.</p>
    </div>
</footer>
<!-- footer area end-->

</div>
    <!-- page container area end -->
    
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script>
        $(document).ready(function(){
            $("#jml_beli").keyup(function(){
                total = $("#jml_beli").val() * formatrp($("#harga_beli").val());
                $("#total").val(rupiah(total));
            });
            
            $("#harga_beli").keyup(function(){
                total = $("#jml_beli").val() * formatrp($("#harga_beli").val());
                $("#total").val(rupiah(total));
            });
        });
    </script>

    <!-- Include jquery.js and jquery.mask.js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $( '.uang' ).mask('0.000.000.000', {reverse: true}); // Format mata uang.
            // $( '.no_hp' ).mask('0000−0000−0000'); // Format nomor HP.
            $( '.nohp' ).mask('000000000000'); // Format nomor HP.
            $( '.angka' ).mask('0'); //angka
            $( '.tapel' ).mask('0000/0000'); // Format tahun pelajaran.
        });
    </script>

    <!-- dropdown -->
    <script src="assets/js/jquery-chained.min.js"></script>
    <script>
        $(document).ready(function() {
            // $("#kd_produksi").chained("#kd_tukang");
            // $("#kecamatan").chained("#kd_produksi");
        });

        function rupiah(angka)
        {
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function formatrp(rupiah)
        {
            return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
        }
        
        function cek_(){
            var idtukang = $("#kd_tukang").val();
            $.ajax({
                url: 'proses.php',
                data:"id_tukang="+idtukang ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#saldo').val(rupiah(obj.saldo));
            });
        }

        function datakirim_(){
            var nopesan = $("#no_pesan").val();
            $.ajax({
                url: 'proses.php',
                data:"no_pesanan="+nopesan ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#jumlah').val(obj.jumlah);
                $('#nm_brg').val(obj.nm_brg);
                $('#id_pel').val(obj.id_pel);
            });
        }
    </script>

    <script>
        $(document).ready(function(){
            var a = "#nm_tukang,#nm_pel,#jenis,#nm_barang";
            $(a).keypress(function(){
                var charCode = (a.which) ? a.which : event.keyCode
                if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
                    return false;
                return true;
            });

            $("#cari").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>