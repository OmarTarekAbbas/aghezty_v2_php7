<td>
  @if(count($order->products) > 0)
    <a class="btn btn-sm show-tooltip" title="@lang('messages.show_product')" href="{{url("order/".$order->id)}}" data-original-title="show Products"><i class="fa fa-step-forward"></i></a>
  @endif
  @if (Auth::user()->id == 1)
  <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("order/$order->id/delete")}}" title="@lang('messages.template.delete')"><i class="fa fa-trash"></i></a>
  @endif
</td>
