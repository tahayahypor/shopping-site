@extends('admin.layouts.main')

@section('main')
    
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="container" style="margin-top: 100px">
              <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="row">
                                <div class="col-lg-6">
                                <span>لیست نظرات تایید شده</span>

                                </div>
								
                        </header>
                        <table class="table table-striped border-top" id="sample_1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>متن</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($comments as $comment)
                                    

                                <tr>
                                   <td>{{$comment->id}}</td>
                                   <td>{{ $comment->user->name }}</td>
                                   <td>{{ $comment->comment }}</td>

                                    <td>
                                        <form action="{{ route('comments.destroy' ,  $comment->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button class="btn btn-danger col-lg-3" type="submit">حذف</button>
                                        </form>                                   
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </section>

                <div class="text-center">
                
                    {{ $comments->render() }}

                </div>
                </div>
                </div>
            </div>
            
          </section>
      </section>
      <!--main content end-->
@endsection