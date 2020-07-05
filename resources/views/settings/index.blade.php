@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        {{-- <div class="row ml-3 mb-4"> --}}
            <a href="{{route('settings.create')}}" class="btn btn-info btn-sm mb-3">Add Company</a>
        {{-- </div> --}}
        <table class="table table-striped text-center">
            <thead>
                <th>COMPANY</th>
                <th>LOGO</th>
                <th>ADDRESS</th>
                <th>TELEPHONE</th>
                <th>EMAIL</th>
                <th>WEBSITE</th>
                <th>MODIFY</th>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                <tr>
                    <td>{{$setting->company}}</td>
                    <td>{{$setting->logo}}</td>
                    <td>{{$setting->address}}</td>
                    <td>{{$setting->telephone}}</td>
                    <td>{{$setting->email}}</td>
                    <td>{{$setting->website}}</td>
                    <td>
                        <a href="{{route('settings.show',$setting->id)}}" class="btn btn-outline-info btn-sm"><svg
                                class="bi bi-person-plus" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm4.5 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z" />
                            </svg></a>

                        <a class="btn btn-primary btn-sm" href="{{route('settings.edit',$setting->id)}}"><svg
                                class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg></a>

                        <a href="{{ route('settings.destroy',$setting->id) }}" class="btn btn-danger btn-sm text-white delete"
                            data-confirm="Are you sure to delete this item?">
                            <svg class="bi bi-x-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path fill-rule="evenodd"
                                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                                <path fill-rule="evenodd"
                                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />

                            </svg>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('confirmation')
<script>
    let deleteLinks = document.querySelectorAll('.delete');

    for (let i = 0; i < deleteLinks.length; i++) {
        deleteLinks[i].addEventListener('click', function (event) {
            event.preventDefault();

            let choice = confirm(this.getAttribute('data-confirm'));

            if (choice) {
                window.location.href = this.getAttribute('href');
            }
        });
    }

</script>
@endpush
