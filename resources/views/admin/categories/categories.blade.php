@extends('admin.layouts.main')

@section('main')

<!--main content start-->
<section id="main-content">
<section class="wrapper">
<div class="container mt-5">
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
            <div class="row">
                <div class="col-lg-6">
                    <span>
                        لیست دسته بندی ها
                    </span> 

                </div>
                <div class="col-lg-6 mb-2" style="text-align: end">
                    <a href="{{ route('categories.create') }}" class="btn btn-danger">ایجاد دسته بندی</a>
                </div>
            </div>

        </header>
        <table class="table table-striped border-top" id="sample_1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام دسته</th>
                    <th>دسته پدر</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->getParentName() }}</td>
                    <td style="display: flex">
                        <a href="{{ route('categories.edit' , ['category' => $category->id] ) }}" class="btn btn-success" style="margin-left: 2px">ویرایش</a>

                        <form action="{{ route('categories.destroy' , ['category' => $category->id] ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>                                   
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </section>

<div class="text-center">

    {{ $categories->render() }}

</div>

</div>
</div>
</div>
</section>
</section>
<!--main content end-->
@endsection