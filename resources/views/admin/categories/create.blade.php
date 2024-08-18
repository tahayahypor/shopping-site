@extends('admin.layouts.main')

@section('main')

<section id="main-content">
<section class="wrapper container-fluid mt-5">
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading pt-4 pb-4">
        فرم ثبت دسته
        
        </header>
        <div class="panel-body">
            <form role="form" method="POST" action="{{ route('categories.store') }}">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان دسته :</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="متن عنوان  را وارد نمایید" name="name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">عنوان انگلیسی  :</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputEmail1" placeholder="متن اسلاگ  را وارد نمایید" name="slug">

                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="exampleSelect">دسته پدر  :</label>
                    <select type="text" class="form-control @error('category_id') is-invalid @enderror" id="exampleSelect"  name="category_id">

                        <option value="">ندارد</option>

                        @foreach ($parentCategories as $category)

                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                            
                        @endforeach
                        
                    </select>

                    @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                
                <button type="submit" class="btn btn-info mt-4">ثبت</button>
            </form>

        </div>
    </section>
</div>
</div>
</section>
</section>

@endsection