@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    mypage
                    <a href="{{ route('mypage.create') }}" class="btn btn-primary">新規作成</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
