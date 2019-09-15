<form action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên danh mục:</label>
        <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{old('name',isset($category->c_name) ? $category->c_name : '')}}">
            @if($errors->has('name'))
                <div class="error-text">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
                <label>Icon:</label>
                <input type="text" class="form-control" placeholder="fa fa-icon" name="icon" value="{{old('icon',isset($category->c_icon) ? $category->c_icon : '')}}">
                @if($errors->has('icon'))
                <div class="error-text">
                    {{$errors->first('icon')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="c_title_seo">Meta title:</label>
            <input type="text" class="form-control" placeholder="Meta title" name="c_title_seo" value="{{old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}">    
        </div>
        <div class="form-group">
            <label for="c_desccription_seo">Meta Descripption:</label>
            <input type="text" class="form-control" placeholder="Meta Description" name="c_description_seo" value="{{old('c_desccription_seo',isset($category->c_desccription_seo) ? $category->c_desccription_seo : '')}}">
        </div>
        <div class="form-group">
            <div class="chekbox">
                <label><input type="checkbox" name="hot"> Nổi bật</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </form>