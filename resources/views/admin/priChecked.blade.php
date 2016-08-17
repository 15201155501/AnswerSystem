<div class="col-sm-9">
	@foreach($data['privilege'] as $v)
        @if( $v['level'] ==0)
  			@if(in_array($v['pri_id'],$new_arr))
        		<input type="checkbox" id="dian" checked="true" name="pri_id" value="{{  $v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
        	@else
        		<input type="checkbox" id="dian"  name="pri_id" value="{{  $v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
        	@endif
        @else
        	@if(in_array($v['pri_id'],$new_arr))
        		||--<input type="checkbox" id="dian" checked="true" name="pri_id" value="{{$v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
        	@else
        		||--<input type="checkbox" id="dian" name="pri_id" value="{{$v['pri_id'] }}">{{ $v['pri_name'] }}<br/>
        	@endif
        	
        @endif
	@endforeach
</div>