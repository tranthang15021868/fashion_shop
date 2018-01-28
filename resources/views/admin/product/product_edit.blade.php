@extends('admin.master')
@section('content')
<!-- Page Content -->
<style type="text/css" media="screen">
    #insert{margin-top: 20px;}
</style>
<form action="" method="POST" enctype="multipart/form-data" name="frmEditproduct">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="sltParent">
                            <option value="">Please Choose Category</option>
                            <?php
                                cate_parent($cate, 0, "--", $product["cate_id"]);
                            ?>
                        </select>
                        @if($errors -> first('sltParent') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('sltParent') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : null) !!}" />
                        @if($errors -> first('txtName') != null)
                        <div class="alert alert-danger">
                            {!! $errors -> first('txtName') !!}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : null) !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtIntro' ) </script> 
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product) ? $product['content'] : null) !!}</textarea>
                        <script type="text/javascript">CKEDITOR.replace( 'txtContent' ) </script> 
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <img src="{!! asset('resources/upload/' . $product['image']) !!}" alt="" width="150">
                        <input type="file" name="fImages" value="{!! old('fI', isset($product) ? $product['image'] : null) !!}">
                        <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : null) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="form-group">
                    @foreach($product_image as $key => $item)
                    <label >Image Product Detail </label>
                    <div class="form-group" id="{!! $key !!}">
                        <img id="{!! $key !!}" idHinh="{!! $item['id'] !!}" src="{!! asset('resources/upload/detail/'. $item['image']) !!}" alt="" width="150">
                        <a id="del_img" class="btn btn-danger btn-circle icon_del" type="button"><i class="fa fa-times"></i></a>
                    </div>
                    @endforeach
                    <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                    <div id="insert"></div>
                </div>
            </div>      
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
</form>
@endsection()
