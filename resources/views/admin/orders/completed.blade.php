@extends('layout.admin')

@section('content')
<div class="x_content">
<p>Openstaande orders</p>
<div class="table-responsive">
  <table class="table table-striped jambo_table">
    <thead>
      <tr class="headings">
        <th class="column-title">Order nr. </th>
        <th class="column-title">Geplaatst op </th>
        <th class="column-title">Klant </th>
        <th class="column-title">Leveren op </th>
        <th class="column-title">Prijs </th>
        <th class="column-title">Status betaling </th>
        <th class="column-title no-link last"><span class="nobr">Action</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>
    @foreach($orders as $order)
      <tr class="even pointer">
        <td class=" ">{{ $order->id }}</td>
        <td class=" ">{{ $order->created_at }}</td>
        <td class=" ">{{ $order->user->getFullName() }}</td>
        <td class=" ">{{ $order->deliverydate }}</td>
        <td class=" ">€ {{ ($order->price / 100) }}</td>
        <td class=" ">{{ ($order->payment->paid) ? 'Betaald' : 'Openstaand' }}</td>
        <td class=" last"><a href="#">Details</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection