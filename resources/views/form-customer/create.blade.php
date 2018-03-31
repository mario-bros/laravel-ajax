@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Form Customer
@endsection

@section('contentheader_title')
    Form Customer
@endsection



@section('main-content')
<div class="m-content">

    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--tab">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon m--hide">
                        <i class="la la-gear"></i>
                    </span>
                    <h3 class="m-portlet__head-text">
                        {{ $page_title }}
                    </h3>
                </div>
            </div>
        </div>

        {!! Form::open(['id' => "form_customer", 'class' => "m-form m-form--fit m-form--label-align-right"]) !!}
            @include('form-customer._form', [])
        {!! Form::close() !!}

        <!--begin::Section-->
        <div class="m-section" style="padding: 2rem;">
            
            <div class="m-section__content">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID Customer</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                        </thead>
                        <tbody id="result_table_body">
                        @forelse($customers as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{!! $item->alamat !!}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="panel panel-default">
                                        <div class="panel-body text-center">Tidak ada data customer.</div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--end::Section-->

    </div>
    <!--end::Portlet-->

</div>
@stop