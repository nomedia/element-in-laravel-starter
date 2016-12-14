  <template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>角色管理  <small></small></h1>
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
                <label class="el-form-item__label" style="width: 100px;"> 显示名字 </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
                    <input type="text" v-model="list.display_name" class="form-control" value="" />
                    
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['display_name']" class="error text-danger"> {{ error}} </span>
                  </div>
                </div>
              </div>
              <div class="el-form-item">
                <label class="el-form-item__label" style="width: 100px;">权限名称 </label>
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
                <label class="el-form-item__label" style="width: 100px;"> 上级 </label>
                <div class="el-form-item__content" style="margin-left: 100px;">
                  <div class="el-input">
            
                    <el-select v-model="list.pid" filterable placeholder="请选择">
    <el-option

      v-for="list in lists"
      :label="list.display_name"
      :value="list.id">
    </el-option>
  </el-select>
                  </div>
                  <div class="el-form-item__error">
                    <span v-for="error in formErrors['pid']" class="error text-danger"> {{ error}} </span>
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
                <input type="text" class="form-control" v-model="search.display_name" placeholder="名称">
              </div>


          

              <div class="col-xs-4">
                <input type="button" class="btn btn-success" @click="index" value="搜索">
              </div>
            </div>
            
          </div>
          <div class="right">
            
            <el-button type="success" @click="create" icon="plus">新建</el-button>
      <!--       <el-button type="primary" @click="edit" icon="edit">编辑</el-button>
            <el-button type="danger" @click="del" icon="delete">删除</el-button> -->
            <el-button type="default"  @click="index" icon="refresh">刷新</el-button>
          </div>
        </div>



        <el-table   v-loading="loading"
        :data="tree"
        stripe
        highlight-current-row
        @selection-change="handleSelectionChange"
        border
        style="width: 100%">



    <el-table-column
      inline-template
      label="名称"
        fixed
      width="200">
      <div>



        <span style="margin-left: 10px"  v-if="row.pid==0"> <i class="el-icon-caret-bottom"></i>&nbsp;{{row.display_name}}</span>

         <span style="margin-left: 10px"  v-if="row.level==2">&nbsp;&nbsp;&nbsp;&nbsp; {{row.display_name}}</span>
          <span style="margin-left: 10px"  v-if="row.level==3">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; {{row.display_name}}</span>
       
      

      </div>
    </el-table-column>


        <el-table-column
      
        prop="name"
        sortable
        label="名称"
        width="130">
        
        </el-table-column>








        <el-table-column
        
        prop="created_at"
        label="录入时间"
        width="200">
        </el-table-column>
        <el-table-column
        
  inline-template
        label="状态"
       
        width="200">
        <div>
        {{row.status==true?"正常":"禁用"}}
        </div>
        </el-table-column>
        <el-table-column
        
        prop="created_at"
        label="注册日期"
        width="200">
        </el-table-column>

                 <el-table-column
        prop="id"
        label="编号"
        sortable
        width="100">
        </el-table-column>





        <el-table-column
        inline-template
        :context="_self"
        fixed="right"
        label="操作"
        width="200">



        <span>







       
     
                       <el-switch
  v-model="row.status"
  on-color="#13ce66"
  on-text="正常"
  @change="changeStatus(row)"
    off-text="禁用"
  off-color="#ff4949">
</el-switch>


  <!--  <el-button  type="text" size="small">查看</el-button> -->
          <el-button type="text" size="small"  @click="edit(row)">编辑</el-button>




         <el-button type="text" size="small"  @click="del(row)">删除</el-button>





        </span>
        
        </el-table-column>


        </el-table>



        <div class="block">


      </div>
    </section>
  </div>
  </template>
  <script>
  import Breadcrumb from '../ui/Breadcrumb.vue'
  import inputText from '../../components/libs/form/InputText.vue'
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
  handleClick(val) {

    console.log(val);
  console.log(1);
  },
  handleSelectionChange(val) {
  this.multipleSelection = val;

  },

    handleSwitchChange(val) {


  alert(val);

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


  this.$http.put(domain+'api/role/'+this.list.id,input, {
  }
  ).then((response) => {
  this.formErrors=[];
  this.$notify({
  title: '成功',
  message: '更新成功',
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

  this.$http.get(domain+'api/roles',{ params: {search:this.search,per_page:this.paginate.per_page ,page:this.paginate.page } }).then(function (response) {
  this.lists = response.data;
  console.log(this.lists.data);
  this.loading=false;

  this.formateTree(0);

  //loading=false;

  });
  //  this.loading=false

  },

  formateTree:function(pid){
   var lists2=this.lists;
   console.log(lists2);

   var tmp=[];

   $.each(lists2, function(index, val) {

     if(val.pid==pid){

        tmp.push(val);

        $.each(lists2, function(index, val2) {

     if(val2.pid==val.id){
      val2['level']=2;

        tmp.push(val2);

           $.each(lists2, function(index, val3) {

     if(val3.pid==val2.id){
      val3['level']=3;

        tmp.push(val3);

        


      }});


      }});



      }

   });

   this.tree=tmp;

   
     
  },

  store: function () {
  var input = this.list;

  input.status=0;
  console.log(input);

  this.$http.post(domain+'api/role',input, {
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
    this.list={pid:0};

  $('#myModal').modal('show')

  },
checkDelete:function(val){
    
    this.checkDelete=false;
},

changeStatus:function(val){

  this.list=val;

this.update();
},

  edit:function(val){
  var select=val;
 
  this.list=select;
    this.editModel = true;
  $('#myModal').modal('show')

  },




  del:function(val){
  var select=val;
  var ids=new Array();

  ids.push(select.id);





  this.$http.post(domain+'api/role/-1',{_method:'DELETE', ids:ids}).then((response) => {
  if(response.data.rs>0){
  this.$notify({ title: '成功', message: response.data.msg,type: 'success'});
  this.index();
  }else{
  this.$notify({ title: '错误', message: response.data.msg,type: 'error'});
  }

  },(response) => {
  alert("错误");
  })


  

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
  tree:[],
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