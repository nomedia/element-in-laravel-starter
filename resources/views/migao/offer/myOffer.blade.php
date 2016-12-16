@extends('migao.offer.layout')
      

      @section('content')
<header class="mint-header"><div class="mint-header-button is-left"><a @click="back" class=""><button class="mint-button mint-button--default mint-button--normal"><span class="mint-button-icon"><i class="mintui mintui-back"></i></span> <label class="mint-button-text"></label></button></a></div> <h1 class="mint-header-title">我提交的offer</h1> <div class="mint-header-button is-right"></div></header>


<ul class="home_ul" 

  infinite-scroll-disabled="loading"
  infinite-scroll-distance="10">

  <li v-if="lists.length<=0">
    
    <div class="col-xs-12">暂无记录</div>
  </li>

  <li v-for="(item ,index) in lists"  >



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
    
  created :function() {
 this.loadData();
  },
  data(){
  
    return {

      id:0,
      lists:[],
      school:"",

    }

},
  methods: {

getOfferByCollegeHigh:function(id,college_id){

    this.$router.push('/offer/collegeDetail?high='+id+"&college_id="+this.id+"&school="+this.school)


},

    loadData:function(){

 this.$http.get('/api/offer/myOffer').then((response) => {
      response = response.body
      console.log(response)
      this.lists = response
      console.log(this.goods)
      this.$nextTick(() => {
     //   this._initScroll()
       // this._calculateHeight()
      })
    })
    },
back:function(){
  history.back();
},
}
})
</script>


@endsection
