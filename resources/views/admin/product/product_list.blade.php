@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <div class="col-md-12">
                @if(Session::has('flash_messages'))
                    <div class="alert alert-{!! Session::get('flash_level') !!}">
                        {!! Session::get('flash_messages') !!}
                    </div>
                @endif
            </div>  
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stt = 1;
                    ?>
                    @foreach($product as $product)
                        <tr class="odd gradeX" align="center">
                            <td>1</td>
                            <td>{!! $product["name"] !!}</td>
                            <td>{!! number_format($product["price"], 0, ",", ".") !!} $</td>
                            <td> {!! \Carbon\Carbon::createFromTimeStamp(strtotime($product["created_at"])) -> diffForHumans() !!}</td>
                            <td>
                                <?php
                                    $cate = DB::table('cates') -> where('id', $product["cate_id"]) -> first();
                                    if(!empty($cate -> name)) {
                                        echo $cate -> name;
                                    }
                                ?>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacNhanXoa('Bạn có chắc chắn muốn xóa không')" href="{!! URL::route('admin.product.getDelete', $product["id"]) !!}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $product["id"]) !!}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()