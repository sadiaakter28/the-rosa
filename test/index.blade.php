@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body settings-page">
        <div class="row">
            <form action="{{route('profile')}}" method="get">
                <div class="col-md-4 col-lg-4">

                    <div class="input-group">
                        <button style="position: absolute; top: 20px; margin-left: 10px;" type="submit"><i
                                    class="fa fa-search"></i></button>
                        <input type="search" class="form-control"
                               placeholder="search" name="search">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <input type="text" class="form-control" id="post-date" placeholder="date" name="date">
                </div>
                <div class="col-md-4 col-lg-4">
                    <select name="group_type" id="" class="form-control">
                        <option value="all" selected>All Group</option>
                        <option value="upload">upload</option>
                        <option value="curation" {{request()->query('group_type') == 'curation' ? 'selected':''}}>
                            curation
                        </option>
                    </select>
                </div>
            </form>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Test</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Test</th>
                        <th>Time</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->groupInfo->name }}</td>
                            <td>{{ $post->groupInfo->type }}</td>
                            <td>
                                <div>
                                    <img src="{{ $post->accountInfo->avatar }}" alt=""
                                         style="width: 70px; height: 70px;border-radius: 50%;object-fit: cover; object-position: center">
                                </div>
                            </td>
                            <td>{{ $post->post_text }}</td>
                            <td>{{ $post->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>

    </div>
@endsection