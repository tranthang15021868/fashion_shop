@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category Parent</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stt = 1;
                    ?>
                    @foreach($list as $list)
                        <tr class="odd gradeX" align="center">
                            <td>
                                <?php 
                                    echo $stt; 
                                ?>   
                            </td>
                            <td>{!! $list["name"] !!}</td>
                            <td>
                                @if($list["parent_id"] == 0)
                                    {!! "None" !!}
                                @else 
                                    <?php
                                        $parent = DB::table('cates') -> where('id', $list["parent_id"]) -> first();
                                        echo $parent -> name;
                                    ?>
                                @endif   
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick = "return xacNhanXoa('Bạn có chắc chắn muốn xóa không')" href="{!! URL::route('admin.cate.getDelete', $list["id"]) !!}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.cate.getEdit', $list["id"]) !!}">Edit</a></td>
                        </tr>
                        <?php $stt++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection()

