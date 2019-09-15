<form action="" method="POST">
    @csrf
    <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                    <div class="form-group">
                            <label for="a_name">Tên bài viết:</label>
                        <input type="text" class="form-control" placeholder="Tên danh mục" name="a_name" value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}">
                            @if($errors->has('a_name'))
                                <div class="error-text">
                                    {{$errors->first('a_name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="icon">Mô tả:</label>
                                <textarea class="form-control" name="a_description" id="" cols="30" rows="3" placeholder="Mô tả sản phẩm">{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}</textarea>
                                @if($errors->has('a_description'))
                                <div class="error-text">
                                    {{$errors->first('a_description')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="a_content">Nội dung:</label>
                                <textarea class="form-control" name="a_content" id="" cols="30" rows="3" placeholder="Nội dung">{{old('pro_content',isset($article->a_content) ? $article->a_content : '')}}</textarea>
                                @if($errors->has('a_content'))
                                <div class="error-text">
                                    {{$errors->first('a_content')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                                    <label for="a_title_seo">Meta Title:</label>
                                    <input type="text" class="form-control" placeholder="Meta title" name="a_title_seo" value="{{old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '')}}">
                                </div>
                        <div class="form-group">
                            <label for="a_desccription_seo">Meta Descripption:</label>
                            <input type="text" class="form-control" placeholder="Meta Description" name="a_description_seo" value="{{old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '')}}">
                        </div>
                        <div class="form-group">
                            <label for="c_title_seo">Avatar:</label>
                            <input type="file" class="form-control" name="a_avatar">    
                    </div>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
    </div>
    
</form>