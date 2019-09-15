@extends('admin::layouts.master')
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.home')}}">Trang chủ</a></li>
    <li><a href="{{route('admin.get.list.article')}}">Bài viết</a></li>
        <li class="active">Cập nhật</a></li>
    </ol>
</div>
<div>
    @include ("admin::article.form")
</div>
@stop