@extends('voyager::master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3><strong>My Product</strong></h3>
                </div>
            </div>
             <a href="javascript:void(0)" class="btn btn-primary add">Add Product</a>
            <!-- <a href="" class="btn btn-primary">Download ALL Order</a> -->
            <br>
            <div class="row">
                <div class="col-md-6 text-center">           
                    <div class="form-group">
                        <label for="totaltody">Total Today</label>
                        <?php $total = 0;$count =0 ?>
                           @foreach ($data as $datas)
                            <?php $count =  $count + 1;  ?>
                           @endforeach
                        <input  value = "<?php echo $total ?? 0 ?>" type="text"  class="form-control mx-sm-3" disabled>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="form-group">
                    <label for="totaltody">Product Count</label>
                    <input value="<?php echo $count ?? 0 ?>"  type="text"  class="form-control mx-sm-3" disabled>
                    </div>
                </div>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Image</th>
                        <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade modal-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h4 class="modal-title" id="exampleModalLabel">My Product</h4>
        </div>
        <div class="col-md-6">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
      <div class="modal-body">
        <div class="container-fluid">
        <form method="post" id="upload-image-form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" name="title"  id="title" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="visible" class="col-form-label">Visible:</label>
                <input type="text" class="form-control" name="visible" id="visible">
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="price" class="col-form-label">Price:</label>
                <input type="text" class="form-control" name="price"  id="price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="discount_price-name" class="col-form-label">Discount Price:</label>
                <input type="text" class="form-control" name="discount_price" id="discount_price">
                </div>
            </div>
        </div>
        <div class="row">
        <div class="form-group">
            <input type="file" name="file" class="form-control" name="image-input" id="image-input">
            <span class="text-danger" id="image-input-error"></span>
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_title_en" class="col-form-label">Translation Title <B>En</B> </label>
                <input type="text" class="form-control" name="translation_title_en" id="translation_title_en">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_desc_en" class="col-form-label">Translation Desc <B>En</B> </label>
                <input type="text" class="form-control" name="translation_desc_en" id="translation_desc_en">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_title_ar" class="col-form-label">Translation Title <B>Ar</B> </label>
                <input type="text" class="form-control" name="translation_title_ar" id="translation_title_ar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_desc_ar" class="col-form-label">Translation Desc <B>Ar</B> </label>
                <input type="text" class="form-control" name="translation_desc_ar" id="translation_desc_ar">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_title_ku" class="col-form-label">Translation Title <B>Ku</B> </label>
                <input type="text" class="form-control" name="translation_title_ku" id="translation_title_ku">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="translation_desc_ku" class="col-form-label">Translation Desc <B>Ku</B> </label>
                <input type="text" class="form-control" name="translation_desc_ku" id="translation_desc_ku">
                </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button></div>
    </div>
    </form>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.data-table').DataTable({
        ajax: "{{ route('admin.my_products') }}",
        columns: [
            {data: 'title', name: 'title'},
            {data: 'price', name: 'price'},
            {data: 'discount_price', name: 'discount_price'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action'},
        ]
    });
    
    $('body').on('click', '.add', function () { 
        $('.modal-product').modal('show');
    });


    $('body').on('click', '.edit', function () {
        let Item_id;
        if($(this).data('id')){
        Item_id = $(this).data('id');
       }else{
       Item_id = 0 ;
        }
      $.ajax({
            type: "GET",
            url:"{{ route('admin.edit_product') }}/"+Item_id,
            success: function (product) {
                $('#title').val(product.title);
                $('#visible').val(product.visible);
                $('#price').val(product.price);
                $('#discount_price').val(product.discount_price);
                $('#image').attr("src","http://savingapp.co/AdminCp/storage/app/public/"+product.photo);
                $('#translation_title_en').val(product.product_translation_all.filter(x => x.lang==='en').map(x => x.title));
                $('#translation_desc_en').val(product.product_translation_all.filter(x => x.lang==='en').map(x => x.desc));
                $('#translation_title_ar').val(product.product_translation_all.filter(x => x.lang==='ar').map(x => x.title));
                $('#translation_desc_ar').val(product.product_translation_all.filter(x => x.lang==='ar').map(x => x.desc));
                $('#translation_title_ku').val(product.product_translation_all.filter(x => x.lang==='ku').map(x => x.title));
                $('#translation_desc_ku').val(product.product_translation_all.filter(x => x.lang==='ku').map(x => x.desc));
                $('#upload-image-form').attr('data-id' , product.id);
                $('#upload-image-form').attr('data-company' , product.companyId);
                $('.edit').attr('data-company' , product.companyId);
                $('.modal-product').modal('show');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let Item_id
       let formData = new FormData(this);
       if($(this).data('id')){
        Item_id = $(this).data('id');
       }else{
       Item_id = 0 ;
        }
       var Company_id = $(this).data('company');
       $('#image-input-error').text('');
       $.ajax({
          type:'POST',
          url:"{{ route('admin.edit_products') }}/"+Item_id,
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Image has been uploaded successfully');
               $('.modal-product').modal('hide');
                table.draw();
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });
});
$('body').on('click', '.delete', function () {
            var Item_id = $(this).data('id');
$.ajax({
        type: 'DELETE' ,
        url:"{{ route('admin.remove_products') }}/"+Item_id,
        dataType: 'json',
        success:function(data){
            table.draw();
        }});
    });
</script>
@endsection 