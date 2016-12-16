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


<header class="mint-header"><div class="mint-header-button is-left"><a @click="back"class=""><button class="mint-button mint-button--default mint-button--normal"><span class="mint-button-icon"><i class="mintui mintui-back"></i></span> <label class="mint-button-text"></label></button></a></div> <h1 class="mint-header-title">@{{this.school}}</h1> <div class="mint-header-button is-right"></div></header>

<ul class="home_ul" 

  infinite-scroll-disabled="loading"
  infinite-scroll-distance="10">

  <li v-if="lists.length<=0">
    
    <div class="col-xs-12">暂无记录</div>
  </li>

  <li v-for="(item ,index) in lists"   @click="getOfferByCollegeHigh(item.high)" >


<div class="col-xs-3">
        @{{ item.name }}
  </div> 
  <div class="col-xs-5">
    @{{ item.high }}
  </div>

    <div class="col-xs-4 float_right" ><span>
      @{{ item.consultant }}

      @{{ item.instructor }}
  </div>

  </li>

</ul>





@include('migao.offer.baseShare')

  <script>
    new Vue({
      el: '#app',
    
   created () {

   


    this.index();
  },
  data(){

    return{
      high:"{{$request->high}}",
      college_id:{{$request->college_id}},
      lists:[],
      school:"{{$request->school}}"


    }
  },
  methods:{
back:function(){
 history.back();
},
        index:function(){

       this.$http.get('/api/offer/getOfferByCollegeHigh/'+this.college_id+"/"+this.high).then((response) => {
      response = response.body
      console.log(response)
      this.lists = response
      console.log(this.goods)
      this.$nextTick(() => {
     //   this._initScroll()
       // this._calculateHeight()
      })
    })

  }
},

    })
  </script>


@endsection
