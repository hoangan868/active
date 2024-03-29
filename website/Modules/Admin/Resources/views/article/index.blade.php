@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="">Trang chủ</a></li>
        <li><a href="{{route('admin.get.list.article')}}">Sản phẩm</a></li>
        <li><a href="">Danh sách</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="" class="form-inline">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Tên sản phẩm .." name="name" value="{{\Request::get('name')}}">
            </div>
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<div class="table-responsive">
    <h2>Quản lý bài viết <a href="{{route('admin.get.create.article')}}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên bài viết</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($articles))
                @foreach($articles as $article)
                <tr>
                    <td>
                        {{$article->id}}
                    </td>
                    <td>
                        {{$article->a_name}}
                    </td>
                    <td>
                        {{$article->a_description}}
                    </td>
                    <td>
                        <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                    </td>
                    <td>
                            {{$article->created_at}}
                    </td>
                    <td>
                        <a style="padding: 5px 10px;border:1px solid #999;font-size:12px" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pen" style="font-size:11px"> Cập nhật</i></a>
                        <a style="padding: 5px 10px;border:1px solid #999;font-size:12px" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt"> Xóa</i></a>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@stop