<?php
/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Bravo Kiptoo <bkiptoo@collabmed.com>
 *
 * =============================================================================
 */

use Ignite\Settings\Entities\InsuranceSchemePricing;

extract($data);
function modified_price($id, $scheme, $default = null)
{
    $value = InsuranceSchemePricing::whereProcedureId($id)
        ->whereSchemeId($scheme)->first();
    return $value->amount ?? $default;
}

function button_style($id, $scheme)
{
    $value = InsuranceSchemePricing::whereProcedureId($id)
        ->whereSchemeId($scheme)->first();
    if ($value && $value->excluded)
        $product = '<button type="button" va="true" class="btn btn-xs btn-success ex" pid="' . $id . '">Include</button>';
    else
        $product = '<button type="button" va="false" class="btn btn-xs btn-warning ex" pid="' . $id . '">Exclude</button>';
    return $product;
}

?>
@extends('layouts.app')
@section('content_title','Scheme Procedure Price')
@section('content_description','Manage Procedure Price for Scheme')

@section('content')
    <div class="box box-info">

        <div class="box-header with-border">
            <h3 class="box-title">
                Insurance : <strong>{{$scheme->companies->name}}</strong>
                <code>Scheme : <strong>{{$scheme->name}}</strong></code></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @if(!$procedures->isEmpty())
                        <form method="post" id="myForm">
                            {!! Form::token() !!}
                            <table class="table table-striped" id="datatable" width="100%">
                                <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Item</th>
                                    <th style="text-align: right">Default Insurance Price</th>
                                    <th style="text-align: right">Price</th>
                                    <th>Exclusion</th>
                                </tr>
                                </thead>
                                @foreach($procedures as $m)
                                    <tr>
                                        <td>{{$m->code}}</td>
                                        <td>{{$m->name}}</td>
                                        <td style="text-align: right">{{number_format($m->insurance_charge,2)}}
                                        </td>
                                        <td style="text-align: right">
                                            <input type="text" name="insurance{{$m->id}}"
                                                   pid="{{$m->id}}"
                                                   value="{{modified_price($m->id,$scheme->id,$m->insurance_charge)}}"/>
                                        </td>
                                        <td>
                                            {!! button_style($m->id,$scheme->id) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <td>
                                <button type="button" class="btn btn-primary" id="save">
                                    Save
                                </button>
                            </td>
                        </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            var data = [], arrIndex = {};

            function addOrReplace(object) {
                var index = arrIndex[object.product];
                if (index === undefined) {
                    index = data.length;
                    arrIndex[object.product] = index;
                }
                data[index] = object;
            }

            $('#datatable').dataTable({pageLength: 50});
            $(document).on('keyup', 'input[type=text]', function () {
                var product = $(this).attr('pid');
                var update = {
                    product: product,
                    amount: $('input[name=insurance' + product + ']').val(),
                    excluded: $('button[pid=' + product + ']').attr('va'),
                    scheme: "{{$scheme->id}}"
                };
                addOrReplace(update);
            });
            $(document).on('click', 'button.ex', function () {
                var product = $(this).attr('pid');
                $(this).removeClass('btn-warning').removeClass('btn-success');
                if ($(this).attr('va') === 'true') {
                    $(this).attr('va', 'false');
                    $(this).addClass('btn-warning');
                    $(this).html('Exclude');
                } else {
                    $(this).attr('va', 'true');
                    $(this).addClass('btn-success');
                    $(this).html('Include');
                }
                $('input[name=insurance' + product + ']').keyup();
            });
            $('#save').click(function () {
                $.ajax({
                    url: "{{route('api.settings.pne.price.edit','procedure_id')}}",
                    method: 'POST',
                    data: {
                        _token: "{{csrf_token()}}",
                        data: data
                    },
                    dataType: "json",
                    success: function () {
                        alertify.success("Updates saved");
                        data = [];
                        arrIndex = {};
                    },
                    error: function () {
                        alertify.error("An error occurred");
                    }
                });
            });
        });
    </script>
@endsection
