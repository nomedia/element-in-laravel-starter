@extends('migao.offer.layout')
      
      @section('css')
.float_right {
    float: right;
    padding: 0px;
}
.col-xs-5{
  padding-left:0px
}
      @endsection

      @section('content')



sfasdf
@{{message}}









</div>


@endsection
@section('scirpt')


<script>
	

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    list:[]
  }
})
</script>

@endsection