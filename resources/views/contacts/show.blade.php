@extends('layouts.main')
@section('content')
<style type="text/css"> 
    .a-btn
    {
        text-decoration: none !important;
        cursor: pointer;
    }
</style>
@include('layouts.notification')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h5 class="text-white">{{ __('Maker Details') }}</h5>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" class="btn btn-sm btn-outline-secondary text-white" data-toggle="modal" data-target="#AddPartStyleModal">
                <i class="bi bi-plus"></i> 
                Add Part Style
            </a>
            <a href="{{ url('maker') }}" type="button" class="btn btn-sm btn-outline-secondary text-white">
                <i class="bi bi-list"></i> Maker List
            </a>
        </div>
    </div>
</div>
<div class="pt-2"></div>
<div class="container" >
    <div class="row justify-content-center pt-lg-4 pt-xl-3 text-white bg-dark-blue">
        <form method="POST" action="{{ url('maker/update-part-style',$brand->id) }}">
            @csrf
            <div class="row py-4">
                <div class="col-md-3">
                    <h5>
                        Part Style 
                    </h5>
                    <div  class="row">
                        @foreach($part_style_arr as $part_style)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $part_style }}
                            </div>
                        @endforeach
                        <div class="col-md-12" id="part_style"></div>
                        <div class="col-md-12">
                            <a type="button" class="add-new a-btn"> <i class="bi bi-plus"></i> Add New</a>
                            <button type="submit" class="btn-sm a-btn"> <i class="bi bi-save"></i> Save</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Colors</h5>
                    <div  class="row">
                        @foreach($Color_arr as $color)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $color }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1">
                    <h5>Sizes</h5>
                    <div  class="row">
                        @foreach($size_arr as $size)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $size }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1">
                    <h5>Width</h5>
                    <div  class="row">
                        @foreach($width_arr as $width)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $width }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1">
                    <h5>Offset</h5>
                    <div  class="row">
                        @foreach($offset_arr as $offset)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $offset }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Bolt Pattern</h5>
                    <div  class="row">
                        @foreach($bolt_pattern_arr as $bp)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $bp }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>CB</h5>
                    <div  class="row">
                        @foreach($cb_arr as $cb)
                            <div class="col-md-12">
                                <input type="checkbox" checked /> {{ $cb }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="pt-5 py-4"><br/></div>
<!-- add part styl modal  -->
<div class="modal fade" id="AddPartStyleModal">
    <div class="modal-md">
       <!--  <form method="POST" action="{{ url('maker/update-part-style/',$brand->id) }}">
            @csrf
            <div class="modal-header">
                <div class="row">
                    <h4>Add new part style</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="part_style"></div>
                    <div class="col-md-12">
                        <a type="button" class="add-new a-btn"> <i class="bi bi-plus"></i>Add New</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-outline-secondary" type="submit" > Save changes</button>
                    </div>
                </div>
            </div>
        </form> -->
    </div>
</div>
<!-- end modal  -->
<script type="text/javascript">
    $("#part_style").empty();
    var count = 0;
    $(".add-new").click(function()
    {
        count++;

        $("#part_style").append('<div class="row py-2 row_item_'+count+'" id="row_'+count+'">'
            +'<div class="col-md-10">'
                +'<input class="form form-control input-sm" type="text" name="part_style['+count+']["name"]" value="" />'
            +'</div>'
            +'<div class="col-md-2">'
                +'<a class="btn btn-sm btn-danger remove" data-id="'+count+'">X</a>'
            +'</div>'
        +'</div>');

        $(".remove").click(function()
        {
            $(".row_item_"+$(this).data('id')).remove();
        });

    });
</script>
@endsection
