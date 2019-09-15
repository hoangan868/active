<form action="" method="POST">
        @csrf
        <div class="row">
                <div class="col-sm-8">
                        <div class="form-group">
                                <label for="pro_name">Tên sản phẩm:</label>
                            <input type="text" class="form-control" placeholder="Tên danh mục" name="pro_name" value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}">
                                @if($errors->has('pro_name'))
                                    <div class="error-text">
                                        {{$errors->first('pro_name')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="icon">Mô tả:</label>
                                    <textarea class="form-control" name="pro_description" id="" cols="30" rows="3" placeholder="Mô tả sản phẩm">{{old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
                                    @if($errors->has('pro_description'))
                                    <div class="error-text">
                                        {{$errors->first('pro_description')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="pro_content">Nội dung:</label>
                                    <textarea class="form-control" name="pro_content" id="" cols="30" rows="3" placeholder="Nội dung">{{old('pro_content',isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
                                    @if($errors->has('pro_content'))
                                    <div class="error-text">
                                        {{$errors->first('pro_content')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                        <label for="pro_title_seo">Meta Title:</label>
                                        <input type="text" class="form-control" placeholder="Meta title" name="pro_title_seo" value="{{old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '')}}">
                                    </div>
                            <div class="form-group">
                                <label for="pro_desccription_seo">Meta Descripption:</label>
                                <input type="text" class="form-control" placeholder="Meta Description" name="pro_description_seo" value="{{old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '')}}">
                            </div>
                            </div>
                <div class="col-sm-4">
                        <div class="form-group">
                                <label for="c_title_seo">Loai sản phẩm:</label>
                                <select name="pro_category_id" id="" class="form-control">
                                    <option value="">--Chọn loại sản phẩm--</option>
                                    @if(isset($categories))
                                        @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id)? $product->pro_category_id : '') == $category->id ? "selected= 'selected'" : ""}}>{{$category->c_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('pro_category_id'))
                                    <div class="error-text">
                                        {{$errors->first('pro_category_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="c_title_seo">Giá sản phẩm:</label>
                                    <input type="number" name="pro_price" class="form-control" placeholder="Giá sản phẩm" value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}">    
                                    @if($errors->has('pro_price'))
                                    <div class="error-text">
                                        {{$errors->first('pro_price')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                    <label for="c_title_seo">% khuyến mãi:</label>
                                    <input type="number" name="pro_sale" class="form-control" placeholder="% giảm giá" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '')}}">    
                            </div>
                            <div class="form-group">
                                    <label for="c_title_seo">Avatar:</label>
                                    <input type="file" class="form-control" name="avatar">    
                            </div>
                        <div class="form-group">
                                <div class="chekbox">
                                    <label><input type="checkbox" name="hot"> Nổi bật</label>
                                </div>
                        </div>
                </div>
        </div>
        <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>