@extends('admin.layouts.main')

@section('main')

<section id="main-content">
    <section class="wrapper container-fluid">
        <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading pt-4 pb-4">
                    ویرایش دسته
                
                </header>
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route('categories.update' , ['category' => $category->id] ) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان دسته:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="نام دسته را وارد نمایید" name="name"  value="{{ $category->name }}">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان انگلیسی  :</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputEmail1" placeholder="متن اسلاگ  را وارد نمایید" name="slug"  value="{{ $category->slug }}">

                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="exampleSelect">دسته پدر  :</label>
                            <select type="text" class="form-control @error('category-id') is-invalid @enderror" id="exampleSelect"  name="category-id">
                                <option value="">ندارد</option>
                                <option value="" value="{{ $category->caretgry-id }}">دارد</option>
                            </select>

                            @error('category-id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                                

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ویرایش دسته</button>

                <a href="{{ route('categories.index') }}" class="btn btn-default float-left">لغو</a>
            </div>
            <!-- /.card-footer -->
        </form>
            </section>
        </div>
    </div>
    
    
    </section>
</section>
@endsection
