<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
        <div class="col-10">
          <h2>Kategori</h2>
        </div>
        <div class="col-2">
          <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Tambah Kategori</a>
        </div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Judul</th>
              <th>Deskripsi</th>

              <th>Gambar</th>
              
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <!-- <tr>
              <td>1</td>
              <td>ABC</td>
              <td>FDGR.JPG</td>
              <td>122</td>
              <td>eLECTRONCS</td>
              <td>aPPLE</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Add Product Modal start -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="kat_judul" class="form-control" placeholder="">
              </div>
            </div>
            
            
            <div class="col-12">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="kat_isi" placeholder=""></textarea>
              </div>
            </div>
           
            

            
           

            
            <div class="col-12">
              <div class="form-group">
                <!-- <label>Product Image <small>(format: jpg, jpeg, png)</small></label> -->
                <label>Gambar<small></small></label>
                <input type="file" name="kat_ikon" class="form-control">
              </div>
            </div>
            <input type="hidden" name="add_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary add-product">Tambah</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" name="e_kat_judul" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            
            
            <div class="col-12">
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="e_kat_isi" placeholder="Enter product desc"></textarea>
              </div>
            </div>
          

           
            
            
            <div class="col-12">
              <div class="form-group">
                <label>Gambar<small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_kat_ikon" class="form-control">
                <img src="../kat_ikons/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Ubah</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/kategori.js"></script>
