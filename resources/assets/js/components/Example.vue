  <template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>用户管理  <small></small></h1>
      <breadcrumb :itens="breadcrumb"></breadcrumb>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">关闭</span></button>
            <h4 class="modal-title" id="myModalLabel">编辑</h4>
          </div>
          <div class="modal-body">
            
            <form action="" class="form-horizontal">
              
              <div class="el-form-item">
                <label class="el-form-item__label" style="width: 100px;"> 用户名： </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
                    <input type="text" v-model="list.name" class="form-control" value="" />
                    
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['name']" class="error text-danger"> {{ error}} </span>
                  </div>
                </div>
              </div>
              <div class="el-form-item">
                <label class="el-form-item__label" style="width: 100px;">* 邮箱地址 </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
                    <input type="text" v-model="list.email" class="form-control" value="" />
                    
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['email']" class="error text-danger"> {{ error}} </span>
                  </div>
                </div>
              </div>
              <div class="el-form-item">
                <label class="el-form-item__label" style="width: 100px;"> 密码 </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
                    <input type="password" v-model="list.password" class="form-control" value="" />
                    
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['password']" class="error text-danger"> {{ error}} </span>
                  </div>
                </div>
              </div>
              <div class="el-form-item">
                <label class="el-form-item__label" style="width: 100px;"> 密码 </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
                    <input type="password" v-model="list.password_confirmation" class="form-control" value="" />
                    
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['password_confirmation']" class="error text-danger"> {{ error}} </span>
                  </div>
                </div>
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>



       
       
          <button  v-if="editModel"  type="button" class="btn btn-danger" @click="update">编辑</button>

                 <button  v-else  type="button" class="btn btn-danger" @click="store">添加</button>


          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="toolbar">
          <div class="left">
            <div class="row">
        
              <div class="col-xs-4">
                <input type="text" class="form-control" v-model="search.name" placeholder="姓名">
              </div>


              <div class="col-xs-3">
                <input type="text" class="form-control" v-model="search.email" placeholder="邮箱">
              </div>


              <div class="col-xs-4">
                <input type="button" class="btn btn-success" @click="index" value="搜索">
              </div>
            </div>
            
          </div>
          <div class="right">
            
            <el-button type="success" @click="create" icon="plus">新建</el-button>
            <el-button type="primary" @click="edit" icon="edit">编辑</el-button>
            <el-button type="danger" @click="del" icon="delete">删除</el-button>
            <el-button type="default"  @click="index" icon="refresh">刷新</el-button>
          </div>
        </div>
        <el-table   v-loading="loading"
        :data="lists.data"
        stripe
        highlight-current-row
        @selection-change="handleSelectionChange"
        border
        style="width: 100%">
        <el-table-column
        fixed
        type="selection"
        width="50">
        </el-table-column>
          <el-table-column
        prop="id"
        label="编号"
        width="80">
        </el-table-column>
        <el-table-column
        fixed
        prop="name"
        label="姓名"
        width="130">
        
        </el-table-column>
        <el-table-column
        prop="email"
        label="邮箱"
        width="200">
        </el-table-column>
      
        <el-table-column
        
        prop="created_at"
        label="注册日期"
        width="200">
        </el-table-column>
        <el-table-column
        
       inline-template
        label="职位"
        width="200">
        <div>
          <el-tag type="success">产品部经理</el-tag>
          <el-tag type="success">财务部经理</el-tag>
        </div>
        </el-table-column>
          
        <el-table-column
        
        prop="created_at"
        label="注册日期"
        width="200">
        </el-table-column>
        <el-table-column
        inline-template
        :context="_self"
        fixed="right"
        label="操作"
        width="160">
        <span>

                                 <el-switch
  v-model="row.status"
  on-color="#13ce66"
  on-text="正常"
  @change="changeStatus(row)"
    off-text="禁用"
  off-color="#ff4949">
</el-switch>
<!--           <el-button @click="handleClick" type="text" size="small">查看</el-button>
          <el-button type="text" size="small">编辑</el-button> -->
     
        </span>
        
        </el-table-column>
        </el-table>
        <div class="block">
          
          <el-pagination
          @size-change="handleSizeChange"
          @current-change="handleCurrentChange"
          :current-page="lists.current_page"
          :page-sizes="[30,100, 200, 300, 400]"
          :page-size="paginate.per_page"
          layout="total, sizes, prev, pager, next, jumper"
          :total="lists.total">
          </el-pagination>
        </div>
        <el-popover
        ref="popover5"
        placement="top"
        width="160"
        v-model="visible2">
        <p>这是一段内容这是一段内容确定删除吗？</p>
        <div style="text-align: right; margin: 0">
          <el-button size="mini" type="text" @click="visible2 = false">取消</el-button>
          <el-button type="primary" size="mini" @click="visible2 = false">确定</el-button>
        </div>
        </el-popover>
        
      </div>
    </section>
  </div>
  </template>
  <script>
  import Breadcrumb from './ui/Breadcrumb.vue'
  import inputText from './../components/libs/form/InputText.vue'
  export default {
  created:function(){
  this.index();


  },

  watch:{

   search: {
        handle: function () {
          alert('changed');
        },
        deep: true
    }

  },
  methods: {
  handleClick() {
  console.log(1);
  },
  handleSelectionChange(val) {
  this.multipleSelection = val;

  },
  handleSizeChange(val) {
  this.paginate.per_page = val;
  this.lists.per_page=val;
  this.index();
  //传递  page   per_page
  //
  },
  handleCurrentChange(val) {
  this.paginate.page = val;
  this.lists.page=val;
  this.index();
  console.log(`当前页: ${val}`);
  },
  formatter(row, column) {
  return row.address;
  },
  filterTag(value, row) {
  return row.tag === value;
  },
  handleReset() {
  this.$refs.ruleForm.resetFields();
  },
  handleSubmit(ev) {
  this.$refs.ruleForm.validate((valid) => {
  if (valid) {
  alert('submit!');
  } else {
  console.log('error submit!!');
  return false;
  }
  });
  },




update:function(){

  var input = this.list;
      if(this.list.status==true){
    this.list.status=1;
  }else{
    this.list.status=0;
  }
   input['_method']='patch';


  this.$http.put(domain+'api/user/'+this.list.id,input, {
  }
  ).then((response) => {
  this.formErrors=[];
  this.$notify({
  title: '成功',
  message: '这是一条成功的提示消息',
  type: 'success'
  });
  //  toastr.success('添加成功', '成功', {timeOut: 5000});
  this.index();
  //   this.changePage(this.pagination.current_page);
  $('#myModal').modal('hide')


  }, (response) => {

  this.formErrors = response.data;
  //  toastr.error('!', '填写错误', {timeOut: 5000});
  this.$notify({
  title: '错误',
  message: '请确认输入内容',
  type: 'error'
  });
  });


},



  index: function(page=1) {
  this.loading=true;
  var loading=this.loading;

  this.$http.get(domain+'api/users',{ params: {search:this.search,per_page:this.paginate.per_page ,page:this.paginate.page } }).then(function (response) {
  this.lists = response.data;
  console.log(this.lists.data);
  this.loading=false;

  //loading=false;

  });
  //  this.loading=false

  },


  store: function () {
  var input = this.list;
  console.log(input);

  this.$http.post(domain+'api/user',input, {
  }
  ).then((response) => {
  this.formErrors=[];
  this.$notify({
  title: '成功',
  message: '这是一条成功的提示消息',
  type: 'success'
  });
  //  toastr.success('添加成功', '成功', {timeOut: 5000});
  this.index();
  //   this.changePage(this.pagination.current_page);
  this.list = {'title':'','description':''};
  $("#create-item").modal('hide');

  }, (response) => {

  this.formErrors = response.data;
  //  toastr.error('!', '填写错误', {timeOut: 5000});
  this.$notify({
  title: '错误',
  message: '请确认输入内容',
  type: 'error'
  });
  });
 
  // this.index()
  },

  create:function(){
    loading:false,
    this.editModel = false;
    this.list={};

  $('#myModal').modal('show')

  },


  edit:function(){
  var select=this.multipleSelection;
  if(select.length==1){
  this.list=select[0];
    this.editModel = true;
  $('#myModal').modal('show')
  }else{
  this.$notify({ title: '错误', message: "请选择一条记录",type: 'error'});
  }
  },



changeStatus:function(val){

  this.list=val;

this.update();
},
  del:function(){
  var select=this.multipleSelection;
  var ids=new Array();
  $.each(select, function(index, val) {
  ids.push(val.id);

  });




  if(ids.length>0){
  this.$http.post(domain+'api/user/-1',{_method:'DELETE', ids:ids}).then((response) => {
  if(response.data.rs>0){
  this.$notify({ title: '成功', message: response.data.msg,type: 'success'});
  this.index();
  }else{
  this.$notify({ title: '错误', message: response.data.msg,type: 'error'});
  }

  },(response) => {
  alert("错误");
  })


  }else{
  this.$notify({
  title: '错误',
  message: '请先选择记录',
  type: 'error'
  });
  }

  }


  },


  components: {
  Breadcrumb,
  inputText
  },
  data () {
  return {


  lists:[],
  list:{},
  loading:false,
  paginate:{
  page:1,
  per_page:30
  },
    search:{
  },
  editModel:false,
  message:"Hello World",
  formErrors:[],
  multipleSelection: [],
  breadcrumb: [
  { url: '/', icon: 'fa fa-dashboard', title: '首页' },
  { title: '用户管理', active: true }
  ],



  }
  }
  }
  </script>
  <style>
  .el-loading-mask{
  z-index: 4;
  }

  .el-button {
    display: inline-block;
    line-height: 1;
    white-space: nowrap;
    cursor: pointer;
    background: #fff;
    border: 1px solid #C0CCDA;
    color: #1F2D3D;
    text-align: center;
    box-sizing: border-box;
    margin: 0;
    padding: 10px 8px;
    font-size: 14px;
    border-radius: 4px;
}
  </style>