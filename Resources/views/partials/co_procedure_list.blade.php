<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Included Procedures</h3>
    </div>
    <div class="box-body">
        @if($data['procedures']->count()>0)
        <table id="data" class="table table-responsive table-condensed">
            <tbody>
                @foreach($data['procedures'] as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->procedures->name}}</td>
                    <td>{{$p->procedures->categories->name}}</td>
                    <td>{{$p->procedures->cash_charge}}</td>
                    <td>{{$p->price}}</td>
                    <td>
                        <a onclick="setProcedure(<?php echo $p->procedures->id ?>)" class="btn btn-primary btn-xs" id="edit{{$p->id}}"
                           href="#Modal1" data-toggle="modal">
                            <i class="fa fa-pencil-square-o"></i></a>

                        <a class="btn btn-primary btn-xs" id="exclude{{$p->id}}"
                           href="{{route('settings.company.procedures.purge',['co'=>$company->id, 'procedure'=>$p->procedures->id])}}">
                            <i class="fa fa-pencil-square-o"></i>exclude</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Cash Charge</th>
                    <th>Company Cost</th>
                    <th>Edit/Exclude</th>
                </tr>
            </thead>
        </table>
        @else
        <p>No companies!</p>
        @endif
    </div>
    <div class="box-footer">
    </div>
</div>
<div class="modal fade" id="Modal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Company Procedure Price?</h4>
                </div>
                <div class="modal-body">
                    <input type="text" placeholder="Enter new price" class="form-control" autocomplete="false" id="newprice">
                    <input type="hidden" value="" id="procedure">
                    <input type="hidden" value="{{$company->id}}" id="co">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" id="save_price">Save</button>
                    <button class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$url = route('api.settings.save_co_price');
?>
<script>
    var SAVE = "{{$url}}";
    $(document).ready(function () {
        $('#data').DataTable();
        $('#save_price').click(function () {
            var price = $('#newprice').val();
            var procedure = $('#procedure').val();
            var co = $('#co').val();
            $.ajax({
                type: 'GET',
                url: SAVE,
                data: {'price': price, 'procedure': procedure, 'co': co},
                success: function () {
                    alertify.success('Price saved successfully');
                    location.reload();
                },
                error: function (data) {
                    alertify.error('Aw. price update could not be made');
                }
            });
            $("#Modal1").modal('hide');
        });
    });

    function setProcedure(value) {
        $('#procedure').val(value);
        $('#newPrice').val(null);
    }
</script>