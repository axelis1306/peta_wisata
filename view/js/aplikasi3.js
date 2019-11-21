(function($) {
	// fungsi dijalankan setelah seluruh dokumen ditampilkan
	$(document).ready(function(e) {

		// deklarasikan variabel
		var kd_mhs = 0;
		var main = "funcExplore.php";

		// tampilkan data explore dari berkas explore.data.php
		// ke dalam <div id="data-explore"></div>
		$("#data-explore").load(main);

		
		// ketika inputbox pencarian diisi
		$('input:text[name=pencarian]').on('input',function(e){
			var v_cari = $('input:text[name=pencarian]').val();
			
			if(v_cari!="") {
				$.post(main, {cari: v_cari} ,function(data) {
					// tampilkan data explore yang sudah di perbaharui
					// ke dalam <div id="data-explore"></div>
					$("#data-explore").html(data).show();
				});
			} else {
				// tampilkan data explore dari berkas explore.data.php
				// ke dalam <div id="data-explore"></div>
				$("#data-explore").load(main);
			}
		});

				// ketika inputbox pencarian diisi
		$('select[name=pencarianKategori]').on('select',function(e){
			var v_cari = $('select[name=pencarianKategori]').val();
			
			if(v_cari!="") {
				$.post(main, {kategory_id: v_cari} ,function(data) {
					// tampilkan data explore yang sudah di perbaharui
					// ke dalam <div id="data-explore"></div>
					$("#data-explore").html(data).show();
				});
			} else {
				// tampilkan data explore dari berkas explore.data.php
				// ke dalam <div id="data-explore"></div>
				$("#data-explore").load(main);
			}
		});




		// ketika tombol halaman ditekan
		$('.halaman').live("click", function(event){
			// mengambil nilai dari inputbox
			kd_hal = this.id;

			$.post(main, {halaman: kd_hal} ,function(data) {
				// tampilkan data explore yang sudah di perbaharui
				// ke dalam <div id="data-explore"></div>
				$("#data-explore").html(data).show();
			});
		});
		

	});
}) (jQuery);
