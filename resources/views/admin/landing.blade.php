@extends('layouts.admin')

@section('content')
<section class="">

    <div class="container">
        <div class="card my-4 shadow p-3">
           <a class="text-danger" href="{{url('/admin')}}">return</a>


           <div class="my-4">
           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                    <div class="alert alert-danger">
                        {{ session()->get('message') }}
                    </div>
            @endif
               <form action="/landing" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <div class="my-3">
                       <label for="">Background image upload</label>
                       <input name="landing" class="form-control" type="file" />
                   </div>
                   <button type="submit" class="btn btn-success">SUBMIT</button>
                </form>
           </div>
        </div>
    </div>

</section>
@endsection
