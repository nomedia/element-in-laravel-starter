@extends('migao.offer.layout')
      

      @section('content')

<header class="mint-header"><div class="mint-header-button is-left"><a @click="back" class=""><button class="mint-button mint-button--default mint-button--normal"><span class="mint-button-icon"><i class="mintui mintui-back"></i></span> <label class="mint-button-text"></label></button></a></div> <h1 class="mint-header-title">@{{this.school}}</h1> <div class="mint-header-button is-right"></div></header>


<ul class="home_ul" 

  infinite-scroll-disabled="loading"
  infinite-scroll-distance="10">

  <li v-if="noData==1">
    
    <div class="col-xs-12">暂无记录</div>
  </li>

 
  <li v-for="(item ,index) in lists"   @click="getOfferByCollegeHigh(item.id)" >


  <!-- <div class="col-xs-1">
      @{{ index+1 }}
  </div> -->
  <div class="col-xs-6">
    @{{ item.name }}
  </div>

    <div class="col-xs-3 float_right" ><span>
     @{{item.count}} 人</span>         <i class="fa fa-angle-right" aria-hidden="true"></i>
  </div>

  </li>


</ul>

@include('migao.offer.baseShare')

<script>
    new Vue({
      el: '#app',
    
 created () {

   

    console.log(this.school);

    this.index();

    console.log(this.lists);


},
data(){
  
    return {

      id:'{{$request->id}}',
      lists:[],
      school:'{{$request->school}}',
            noData:0,

    }

},
  methods: {

getOfferByCollegeHigh:function(id,college_id){

    window.location.href='/offer/highDetail?high='+this.school+"&college_id="+id+"&school="+this.school;


},


back:function(){
 history.back();
},

    index:function(){

       this.$http.get('/api/offer/getCollegeByHigh/'+this.id).then((response) => {
      response = response.body
      console.log(response)

      if(response.length<0){
              this.noData=1;
      }
      console.log(response);
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
