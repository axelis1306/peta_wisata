$(document).ready(function(){

	var productList;

	function getMaps(){
		$.ajax({
			url : '../admin/classes/Maps.php',
			method : 'POST',
			data : {GET_PRODUCT:1},
			success : function(response){
				//console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var productHTML = '';

					productList = resp.message.artikel;

					if (productList) {
						$.each(resp.message.artikel, function(index, value){

							productHTML += '<tr>'+
								              '<td>'+value.artikel_id+'</td>'+
								              '<td>'+ value.artikel_judul +'</td>'+
								              '<td><img width="60" height="60" src="../img/'+value.artikel_gambar+'"></td>'+
								              '<td>'+ value.artikel_lat +'</td>'+
								              '<td>'+ value.artikel_long +'</td>'+
								              '<td>'+ value.kat_judul +'</td>'+
								              
								              '<td><a class="btn btn-sm btn-info edit-product" style="color:#fff;"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a pid="'+value.artikel_id+'" class="btn btn-sm btn-danger delete-product" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
								            '</tr>';

						});

						$("#product_list").html(productHTML);
					}

					


					var catSelectHTML = '<option value="">Kategori</option>';
					$.each(resp.message.kategori, function(index, value){

						catSelectHTML += '<option value="'+ value.kat_id +'">'+ value.kat_judul +'</option>';

					});

					$(".category_list").html(catSelectHTML);

					

				}
			}

		});
	}

	getMaps();

	$(".add-product").on("click", function(){

		$.ajax({

			url : '../admin/classes/Maps.php',
			method : 'POST',
			data : new FormData($("#add-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#add-product-form").trigger("reset");
					$("#add_product_modal").modal('hide');
					getMaps();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});

	});


	$(document.body).on('click', '.edit-product', function(){

		console.log($(this).find('span').text());

		var product = $.parseJSON($.trim($(this).find('span').text()));

		console.log(product);

		$("input[name='e_artikel_judul']").val(product.artikel_judul);
		
		$("select[name='e_artikel_kat']").val(product.kat_id);
		$("textarea[name='e_artikel_isi']").val(product.artikel_isi);
		$("input[name='e_artikel_lat']").val(product.artikel_long);
		$("input[name='e_artikel_long']").val(product.artikel_lat);
		$("input[name='e_artikel_alamat']").val(product.artikel_alamat);
		$("input[name='e_artikel_buka']").val(product.artikel_buka);
		$("input[name='e_artikel_tiket']").val(product.artikel_tiket);
		$("input[name='e_artikel_gambar']").siblings("img").attr("src", "../img/"+product.artikel_gambar);
		$("input[name='pid']").val(product.artikel_id);
		$("#edit_product_modal").modal('show');

	});

	$(".submit-edit-product").on('click', function(){

		$.ajax({

			url : '../admin/classes/Maps.php',
			method : 'POST',
			data : new FormData($("#edit-product-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-product-form").trigger("reset");
					$("#edit_product_modal").modal('hide');
					getMaps();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
			}

		});


	});

	$(document.body).on('click', '.delete-product', function(){

		var pid = $(this).attr('pid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({

				url : '../admin/classes/Maps.php',
				method : 'POST',
				data : {DELETE_PRODUCT: 1, pid:pid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getMaps();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});