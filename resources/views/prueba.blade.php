<link rel="stylesheet" href="/css/datatables/jquery.dataTables.css"/>
<link rel="stylesheet" href="/css/datatables/dataTables.bootstrap.css"/>






<div class="row">
    <div class="col-md-12">

            <table id="table" class="table table-striped table-bordered" cellpadding="0" cellspacing="0" border="0" >
                <thead>
                <tr>
                    <th>PDV</th>
                    <th>Vendedor</th>
                    <th>Sucursal</th>
                    <th>Fact.</th>
                    <th>Num.</th>
                    <th>Estado</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Hora</th>

                </tr>
                </thead>

                <tbody>



                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td align="right">7</td>
                        <td>8</td>
                        <td>9</td>
                    </tr>

                <tfoot>
                <tr>
                    <td colspan="12"><small>[Resumen] Total: 5 Cant.:3</small></td>
                </tr>
                </tfoot>
                </tbody>
            </table>



            <p class='text-danger'><i class="fa fa-check-square-o"></i>No existen datos para mostrar.</p>

    </div>
</div>


















<script src="/js/datatables/jquery.dataTables.js"  type="text/javascript"></script>
<script src="/js/datatables/dataTables.bootstrap.js"  type="text/javascript"></script>


<script type="text/javascript">
    $(function () {

        $('.example1').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
