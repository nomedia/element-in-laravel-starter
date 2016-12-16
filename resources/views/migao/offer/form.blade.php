@extends('migao.offer.layout')
      
@section('css')

.el-input__inner {
    -moz-appearance: none;
    appearance: none;
    background-color: #fff;
    border-radius: 4px;
    border: 1px solid #ffffff;

    }
@endsection
      @section('content')



<header class="mint-header"><div class="mint-header-button is-left"><a @click="back" class=""><button class="mint-button mint-button--default mint-button--normal"><span class="mint-button-icon"><i class="mintui mintui-back"></i></span> <label class="mint-button-text"></label></button></a></div> <h1 class="mint-header-title">offer提交</h1> <div class="mint-header-button is-right"></div></header>

  

<div class="col-md-12">




 



<h4>提交人身份</h4>

<div class="button_group">
<input type="button" class="btn btn-default" @click="checkIdentity(1)"  v-bind:class='{ button_check: this.identity==1}' value="本人" >

<input type="button" class="btn btn-default  " @click="checkIdentity(2)"  v-bind:class='{ button_check: this.identity==2}' value="家长">
<input type="button" class="btn btn-default" @click="checkIdentity(3)" v-bind:class='{ button_check: this.identity==3}' value="老师">
<input type="button" class="btn btn-default" @click="checkIdentity(4)" v-bind:class='{ button_check: this.identity==4}' value="其他">
</div>

<hr>

<mt-field label="学生姓名（保密）" placeholder="未填写" v-model="list.name"></mt-field>
<mt-field label="毕业高中（全程）" placeholder="未填写" type="text" v-model="list.high"></mt-field>






<a class="mint-cell mint-field"><!----> <div class="mint-cell-left"></div> <div class="mint-cell-wrapper"><div class="mint-cell-title"><!----> <span class="mint-cell-text">录取大学（全程）</span> <!----></div> <div class="mint-cell-value">

 <el-select v-model="college_id" filterable placeholder="请选择">
    <el-option
      v-for="item in options"
      :label="item.label"
      :value="item.value">
    </el-option>
  </el-select>



 <div class="mint-field-clear" style="display: none;"><i class="mintui mintui-field-error"></i></div> <span class="mint-field-state is-default"><i class="mintui mintui-field-default"></i></span> <div class="mint-field-other"></div></div></div> <div class="mint-cell-right"></div> <!----></a>
  



<hr>


<h4 class="h4_padd">申请结果</h4>

<div class="button_group">
<input type="button" class="btn btn-default"  @click="checkResult(1)"  v-bind:class='{ button_check: this.result==1}'  value="录取">

<input type="button" class="btn btn-default" @click="checkResult(2)"  v-bind:class='{ button_check: this.result==2}' value="延迟">
<input type="button" class="btn btn-default" @click="checkResult(3)"  v-bind:class='{ button_check: this.result==3}' value="其他">
</div>

<hr>

<mt-field label="顾问机构（选填）" placeholder="未填写" type="text" v-model="list.consultant"></mt-field>
<mt-field label="指导老师（选填）" placeholder="未填写" type="text"  v-model="list.instructor"></mt-field>


<mt-button size="large" @click="create">提交</mt-button>


</div>





<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
        <h4 class="modal-title" id="myModalLabel"  @click="create">确认信息 @{{data.name}}</h4>
      </div>
      <div class="modal-body">
        
    <p>提交人身份： 个人</p>
    <p>学校姓名：@{{this.list.name}}</p>
    <p>毕业高中：@{{this.list.high}}</p>
    <p>毕业学校：米高大学</p>

    <p>申请结果：录取</p>
    <p>顾问机构：吃成培训</p>
    <p>指导老师：wang</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary">确认提交</button>
      </div>
    </div>
  </div>
</div>

@include('migao.offer.baseShare')
<script>
    new Vue({
      el: '#app',
    computed: {
    filterResult() {
      return this.defaultResult.filter(value => new RegExp(this.value, 'i').test(value));
    }
  },
      data:function() {
    return {     options: [



@foreach($lists as $key=> $list)
      {
          value: '{{$list->id}}',
          label: '{{$list->name}}'
        },

        @endforeach

     



        ],
        college_id: '',
      

    list:{},
    identity:1,
    result:1,
    data:{},
    
   }
},
       methods:{


        modealCheck:function(){

console.log(this.list);
this.data=this.list;
$('#myModal').modal('show');

        },
        create: function() {
   this.update();
      console.log(this.list);

    },
       open(msg) {
        this.$message({
          message: msg,
          type: 'success'
        });
      },

    checkIdentity:function(val){

     this.identity=val;
      console.log(this.identity);
    },
    checkResult:function(val){
      this.result=val;
    },

    back:function(){
      history.back();
},

share:function(id){

    window.location.href='/offer/share?share_id='+id;


},
    update:function(){

var  input=this.list;

input.identity=this.identity;
input.result=this.result;
input.college_id=this.college_id;

if(!input.name){
  this.open('用户名不能为空1');
}
if(!input.high){
  this.open('高中不能为空！');
}
if(!input.college_id){
  this.open('大学不能为空！');
}
else{
  this.$http.get('/api/offer/uploadInfo',{ params: {data:input } }).then(function (response) {
  

  console.log(response.data);


  if(response.data.rs){

 
var id=response.data.data.id;
  this.share(id);
  }else{
  alert('上传失败');

  }
  //loading=false;

  });

}



    }
}
})
</script>


@endsection
