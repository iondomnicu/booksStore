@extends('base')
@section('content')
<div class="container">
    <div class="row">
    @if(!empty($products) && count($products)>0)
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Pret</th>
                    <th style="width:8%">Cantitate</th>
                    <th style="width:22%" class="text-center">Pret total</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $i)
                    <tr id="{{$i->id}}">
                        <td>
                            <div class="row">
                                <div class="col-sm-2 col-xs-2">
                                    <a href="{{URL("product/".$i->id)}}">
                                        @if(\File::exists($i->address))
                                            <img  src="{{asset($i->address)}}" class="img-responsive"/>
                                        @else
                                            <img src="{{ asset('img/system/default.jpg') }}" class="img-responsive"/>
                                        @endif
                                    </a>
                                </div>
                                <div class="col-sm-9">
                                    <a href="{{URL("product/".$i->id)}}" style="color:#555555">
                                        <p>{{$i->originalname}}{{$i->name}}</p>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td data-th="Pret:">
                            {{number_format($i->price, 2, '.', ' ')}}
                            <span>Lei</span>
                        </td>
                        <td data-th="Cantitate:">
                            <input type="number" class="form-control text-center" name="cantitate" idcant="{{$i->id}}" value="{{$i->cantitate}}">
                        </td>
                        <td data-th="Pret total:" class="text-center">
                            <span id="priceone{{$i->id}}">
                                {{number_format($i->total, 2, '.', ' ')}}
                            </span>
                            <span>Lei</span>
                        </td>
                        <td class="actions">
                            <button class="btn btn-link btn-sm stergedincos" del="{{$i->id}}" name="delfromcart">
                                <span class="text-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Sterge din cos
                                </span>
                            </button>								
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <a href="{{URL("/")}}" class="btn btn-warning">
                            <i class="fa fa-angle-left"></i> 
                            Continua cumparaturile
                        </a>
                        <a id="golestecos" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>
                            Goleste cosul
                        </a>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="text-center">
                        <strong>Total: 
                            <span id="total">{{number_format($total->totalprice, 2, '.', ' ')}}</span> Lei
                        </strong>
                    </td>
                    <td>
                        <a href="{{URL('/comanda')}}" class="btn btn-success btn-block">
                            Cumpara 
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div class="modal fade" id="comfirm_delete_cart" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Sterge Cos</h4>
                </div>
                <div class="modal-body text-center">
                    <h2 class="calibri" style="margin: 0px 0px 15px 0px;">Sigur doriti sa stergeti toate produsele din cos?</h2>
                    <button class="btn btn-default" id="yesdelete">Da</button>
                    <button class="btn btn-primary" data-dismiss="modal">Nu</button>
                </div>
              </div>
            </div>
        </div>
    @else
        <h1 class='text-center'>Cos gol</h1>
    @endif   
    </div>
</div>
    <script>
        $("#golestecos").on("click",function(){
            $("#comfirm_delete_cart").modal(); 
        });
        $("#yesdelete").on("click",function(){
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/deleteallcart')}}", 
                success: function() {
                    location.reload();
                }
            });
        });
        $("input[name=cantitate]").on("blur",function(){
            var id=$(this).attr("idcant");
            var cantitate=$(this).val();
            var input=$(this);
            $("#fullpageload").show();
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/updatecart')}}", 
                data: 
                    { 
                      id:id,
                      cantitate:cantitate
                    },
                success: function(data) {
                    $("#total").html(data[1]);
                    if(data[1]==0){
                        $("#cart").html("<h1 class='text-center'>Cos gol</h1>")
                    }
                    input.val(data[0].cantitate);
                    $("#priceone"+id).html(data[0].totalone)
                    $("#fullpageload").hide();
                }
            });
            
        });
        $("button[name=delfromcart]").on("click",function(){
            var idprod=$(this).attr("del");
            $("#fullpageload").show();
            $.ajax({  
                type: 'POST',  
                url: "{{URL('/delcart')}}", 
                data: 
                    { 
                      id:idprod
                    },
                success: function(data) {
                    $("#"+idprod).remove();
                    $("#total").html(data);
                    if(data==0){
                        $("#cart").html("<h1 class='text-center'>Cos gol</h1>")
                    }
                    $("#fullpageload").hide();
                }
            });
        });
    </script>
@endsection