@extends('view')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4 mb-3">
            <div class="card">
                <div class="card-header">Notifikasi </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        @foreach ($notifikasi as $n)
                            @if ($n->seen == 0)
                                <li class="list-group-item">
                                    <a href="{{$n->slug}}"> {{ $n->subject }} </a>
                                </li>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @php
                $model::where('id_user', $user->id)->where('seen', 0)->update(['seen' => 1]);
            @endphp
        </div>
    </div>
</div>
@endsection
