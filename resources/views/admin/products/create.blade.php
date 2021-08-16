@extends('admin.master')

@section('content')
    <div class="row clearfix justify-content-center">
        <div class="col-md-9 ">
            <div class="card border border-light">
                <div class="card-header">
                    <span class="card-title">ایجاد محصول جدید</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" refer method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">عنوان محصول :</span>
                            </div>
                            <input name="title" type="text" class="form-control" aria-label="عنوان محصول :"
                                   aria-describedby="inputGroup-sizing-sm" placeholder="عنوان محصول را وارد کنید...">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">توضیحات محصول :</span>
                            </div>
                            <textarea name="description" class="form-control" aria-label="با ناحیه متن" style="margin-top: 0px; margin-bottom: 0px; height: 80px;" ></textarea>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">نام مستعار :</span>
                            </div>
                            <input name="slug" type="text" class="form-control" aria-label="نام مستعار :"
                                   aria-describedby="inputGroup-sizing-sm" placeholder="نام مستعار محصول را وارد کنید...">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">قیمت :</span>
                            </div>
                            <input name="price" type="number" class="form-control" aria-label="قیمت :"
                                   aria-describedby="inputGroup-sizing-sm" placeholder="قیمت محصول را وارد کنید...">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">قیمت ویژه :</span>
                            </div>
                            <input style="-webkit-appearance: none;" name="discount_price" type="number" min="0.00" max="100000000" class="form-control" aria-label="قیمت ویژه :"
                                   aria-describedby="inputGroup-sizing-sm" placeholder="قیمت ویژه محصول را وارد کنید...">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">وضعیت نشر :</span>
                            </div>
                            <div>
                                <label class="fancy-radio custom-color-green"><input name="status" value="1" type="radio"><span><i></i>فعال</span></label><br>
                            </div>
                            <div>
                                <label class="fancy-radio custom-color-red"><input name="status" value="0" type="radio"><span><i></i>غیر فعال</span></label>
                            </div>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">دسته محصول :</span>
                                </div>
                                <select class="selectpicker" name="category_id[]" placeholder="دسته والد را انتخاب کنید..." multiple>
                                    <option value="" selected>دسته محصول را انتخاب کنید...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }} </option>

                                        @if (count($category->sub_category) > 0)
                                            @include('admin.partials.category' , ['categories' => $category->sub_category , 'level' => 1])
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">برند :</span>
                            </div>
                                <select class="selectpicker" name="brand_id" placeholder="دسته والد را انتخاب کنید...">
                                    <option value="" selected>برند محصول را انتخاب کنید...</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }} </option>
                                    @endforeach
                                </select>
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">متای توضیحات :</span>
                            </div>
                            <input name="meta_desc" type="text" class="form-control" aria-label="متای توضیحات :" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">متای عنوان :</span>
                            </div>
                            <input name="meta_title" type="text" class="form-control" aria-label="متای عنوان :" aria-describedby="inputGroup-sizing-sm">
                        </div>

                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">متای کلیدواژه ها :</span>
                            </div>
                            <input name="meta_keywords" type="text" class="form-control" aria-label="متای کلیدواژه ها :" aria-describedby="inputGroup-sizing-sm">
                        </div>


                        <div class="btn-group-toggle float-right">
                            <button type="submit" class="btn btn-outline-success" title="save">
                                <span class="sr-only"></span>
                                <i class="fa fa-save"></i>
                                دخیره
                            </button>
                            <button type="reset" class="btn btn-outline-danger">
                                <span class="sr-only"></span>
                                <i class="fa fa-trash-o"></i>
                                انصراف
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection()

@section('scripts')
    <script>
        var drop = new Dropzone('#photo' , {
            url : "{{ route('photos.upload') }}",
            addRemoveLinks : true,
            maxFiles : 1,
            sending : function (file , xhr , formData){
                formData.append("_token" , "{{ csrf_token() }}")
            },
            success : function (file , response){
                document.getElementById('photo-brand').value = response.photo_id
            }
        });
    </script>
@endsection
