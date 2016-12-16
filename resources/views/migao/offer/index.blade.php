@extends('migao.offer.layout')
      
      @section('css')

   .btn_group {
    padding-top: 10px;
    padding-bottom: 10px;
    position: fixed;
    bottom: 0px;
}
      @endsection

      @section('content')


<mt-navbar v-model="selected">
  <mt-tab-item id="1">按录取学校查询</mt-tab-item>
  <mt-tab-item id="2">按毕业高中查询</mt-tab-item>

</mt-navbar>



<!-- tab-container -->
<mt-tab-container v-model="selected" >
  <mt-tab-container-item id="1"   >

<div  ref="listWrapper">

<ul class="home_ul" 
  v-infinite-scroll="loadMore"
  infinite-scroll-disabled="loading"
  infinite-scroll-distance="10">

  <li v-for="(item ,index) in list"  @click="showHighByCollege(item.id,item.name)">


  <div class="col-xs-1">
      @{{ index+1 }}
  </div>
  <div class="col-xs-5">
    @{{ item.name }}
  </div>

    <div class="col-xs-5 float_right" >
     录取人数：<span v-if="item.offer_count.length">  <span v-for="counts in item.offer_count">
      @{{counts.count?counts.count:0}} 
     
      人</span>  </span>   <span v-else> 0 人</span>         <i class="fa fa-angle-right" aria-hidden="true"></i>
  </div>

  </li>

</ul>


</div>


  </mt-tab-container-item>
  <mt-tab-container-item id="2">
<ul class="home_ul" 
  v-infinite-scroll="loadMore"
  infinite-scroll-disabled="loading"
  infinite-scroll-distance="10">
  <li v-for="(item ,index) in high"  @click="showCollegeByHigh(item.high,item.high)">


  <div class="col-xs-1 c999" >
      @{{ index+1 }}
  </div>
  <div class="col-xs-5">
    @{{ item.high }}
  </div>

    <div class="col-xs-5 float_right">
     获得 offer  @{{ item.count }}   &nbsp;&nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i>
  </div>

  </li>
</ul>
  </mt-tab-container-item>

</mt-tab-container>


<div class="col-xs-12 btn_group">
  
<a href="/offer/myOffer">
<input type="button" class="btn btn-default myOffer" value="我提交的 offer"> 
</a>
<a href="/offer/form">

<input type="button" class="btn btn-primary offerForm" value="新增 offer"> 
</a>
</div> 





</div>




    </div>
    <!-- built files will be auto injected -->
  </body>


</html>

@include('migao.offer.baseShare')

  <script>



    var app = new Vue({
      el: '#app',
    data: {
      selected: '1',
      noData:0,
      heigh:[],

         list:[
  


      ],
 

    
  },

  
  created : function(){


this.loadData();
this.loadHighData();






  },
       methods:{
        handleClick: function() {
          this.$toast('Hello world!')
        },

           _initScroll :function() {
     this.listScroll = new BScroll(this.$refs.listWrapper, {})
   
    },
    _calculateHeight :function() {
      this.listWrapper = new BScroll(this.$refs.listWrapper, {})
  
    },

    loadData:function(){

 this.$http.get('/api/offer/getCollegeRanking').then((response) => {
      response = response.body
      console.log(response)
      this.list = response
      console.log(this.goods)
      this.$nextTick(() => {
     //   this._initScroll()
       // this._calculateHeight()
      })
    })
    },

        loadHighData:function(){

 this.$http.get('/api/offer/getHighRanking').then((response) => {
      response = response.body
  
      this.high = response
    
      this.$nextTick(() => {
     //   this._initScroll()
       // this._calculateHeight()
      })
    })
    },

showCollegeByHigh:function(id,high){
    window.location.href='/offer/highList?id='+id+"&school="+high;

},



    showHighByCollege:function(id,school){

window.location.href='/offer/collegeList?id='+id+"&school="+school;

    },

        loadMore:function() {
  this.loading = true;
  setTimeout(() => {
    let last = this.list[this.list.length - 1];
    for (let i = 1; i <= 10; i++) {
    //  this.list.push(last + i);
    }
    this.loading = false;
  }, 2500);
}
      },


    })
  </script>


@endsection
