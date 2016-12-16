@extends('migao.offer.layout')
      
@section('css')


.luo {
    -webkit-animation: luo 1s linear 1 forwards 0.5s;
    opacity: 0;
}
.share_bg{
      background: url(/static/images/share_bg.jpg);
    background-position-x: none;
    background-size: 100%;
}
.sahre_circle{
      color: #a71400;
    text-align: center;
    top: 29%;
    font-size: 28px;
    z-index: 12;
    position: absolute;
    text-align: center;
    left: 25%;
    width: 50%;
}
.school_name {
    color: #c6a06f;
    text-align: center;
    top: 17.5%;
    z-index: 12;
    position: absolute;
    text-align: center;
    margin: 0 auto;
    width: 100%;
}
.high {
    color: #a71400;
    text-align: center;
    top: 37.5%;
    z-index: 12;
    margin: 0 auto;
    width: 100%;
    text-align: center;
    position: absolute;
    }

    .num {
    color: #a71400;
    text-align: center;
    /* top: 68.5%; */
    /* position: absolute; */
    width: 100%;
    z-index: 12;
    paddingt-top: 10px;
    padding-top: 20px;
    padding-bottom: 14px;
}
.bottom_button{
  height:150px;
}

.share_conguatulation {
    color: #a71400;
    text-align: center;
    top: 21%;
    width: 70%;
    left: 15%;
    position: relative;
    z-index: 18;
}

.share_myOffer {
    color: #a71400;
    text-align: center;
    top: 33%;
    width: 30%;
    left: 15%;
    position: relative;
    z-index: 18;
}

.share_form {
    color: #a71400;
    text-align: center;
    top: 33%;
    width: 30%;
    float: right;
    right: 15%;
    position: relative;
    z-index: 18;
}

.jigou {
    color: #a71400;
    text-align: center;
    top: 22.5%;
    z-index: 12;
    position: absolute;
    width: 100%;
}
@endsection
      @section('content')



<div class=" share_bg">
  

<img src="/static/images/share_bg_top.jpg" alt="" width="100%" class="    ">

<div class="body">
<img src="/static/images/share_flow.png" width="100%" alt="" class="share_flow animated  fadeInDown">


<div >
  
</div>
<img src="/static/images/share_success.png" alt="" class="share_success  animated  fadeInDownBig">

<div class="school_name  animated  fadeInDownBig " >
 @{{list.college.name}}
  
</div>

<div class="jigou ">
  
  @{{list.consultant}}
</div>


<div class="">
  


<div class="high ">
  
  @{{list.high}}
</div>
<div class="name animated tada">
  @{{list.name}}
</div>



 <img src="/static/images/sahre_circle.png" class="sahre_circle animated   rotateIn" alt="">


</div>



<div class="num">
  祝贺人数： @{{list.count}}
</div>


<div class="congratulation">
  
  <p v-for="item in list.up"><span>@{{item.user.nickname}}</span> 为您送上最真挚的祝贺!</p>
  
  

</div>







<img src="/static/images/share_code.png" width="100%" alt="">



<div class="bottom_button"><img  @click="congratulation"  src="/static/images/share_conguatulation.png" alt="" class="share_conguatulation  animated infinite pulse"> <a href="/offer"><img src="/static/images/share_myOffer.png" alt="" class="share_myOffer animated  fadeInUpBig"></a> <a href="/offer/form"><img src="/static/images/share_form.png" alt="" class="share_form animated  fadeInUpBig"></a></div>
</div>



</div>
<script>
    new Vue({
      el: '#app',
    created () {

    

   
    this.index(this.share_id);


//http://api.megoal.org/oAuth/get_jssdk_ticket?url=www.baidu.com&state=universityadmintest.migao.me,snsapi_userinfo






  },
  data(){
  
    return {

      share_id:{{$request->share_id}},
      list:[],
      

    }

},
  methods: {
      open() {
        this.$message({
          message: '感谢您的祝贺',
          type: 'success'
        });
      },

        open2() {
        this.$message({
          message: '感谢您的再次祝贺',
          type: 'success'
        });
      },

    index:function(id){

       this.$http.get('/api/offer/getShare?id='+id).then((response) => {
      response = response.body;
      



      this.list=response;


   
    })
    },


   



    congratulation:function(){



             this.$http.get('/api/offer/up?id='+this.share_id).then((response) => {

  
     if(response.body==2){
      this.open2();
     }else{
      this.open();
     }

     



             });

             this.index(this.share_id);



    }
  }
})
</script>


@endsection

@include('migao.offer.share')
