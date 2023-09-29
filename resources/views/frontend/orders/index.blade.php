@extends('layouts.front')

@section('title')
My Orders
@endsection
@section('content')
  <div class="container py-5">
    <div class="row">
        <div class="col-md_12">
            <div class="card">
                <div class="card-header">
                      <h4>Mes commandes</h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                     <tr>                       
                         <th> Date des commandes</th>
                        <th>Numéro de suivi</th>
                        <th>Prix ​​total</th>
                        <th>Statut</th>
                        <th>Action</th>

                     </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                    <td>{{ date('d-m-y',strtotime($item->created_at )) }}</td>
                        <td>{{ $item->trancking_no }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status == '0'?'Pending' :  'Completed'}}</td>

                        <td>
                            <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">Voir</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
          
        </div>
    </div>
  </div>
@endsection
