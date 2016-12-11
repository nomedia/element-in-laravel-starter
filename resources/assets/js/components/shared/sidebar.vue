<template>



<aside class="main-sidebar">


    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/static/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>超级管理员</p>
          <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">

<el-row class="tac">
  <el-col :span="24">
   <li class="header">标签</li>
    <el-menu default-active="2" class="el-menu-vertical-demo dark" @open="handleOpen" @close="handleClose"  theme="dark" >
      <el-submenu index="1">
        <template slot="title"><i class="el-icon-message"></i>系统设置</template>
        <el-menu-item-group>
          <template slot="title">权限管理</template>
            <router-link to="/auth/user">     <el-menu-item index="1-1" router  >用户管理</el-menu-item></router-link>
             <router-link to="/auth/role">    <el-menu-item index="1-3" >角色管理</el-menu-item></router-link>
              <router-link to="/auth/permission">    <el-menu-item index="1-4" >权限管理</el-menu-item></router-link>

                    <router-link to="/auth/menus">    <el-menu-item index="1-4" >菜单管理</el-menu-item></router-link>
                      
        </el-menu-item-group>
        <el-menu-item-group title="员工管理">
        
           <router-link to="/ServiceOrderComplaint">     <el-menu-item index="1-1" router  >新建新员工</el-menu-item></router-link>
             <router-link to="#">    <el-menu-item index="1-3" >新员工列表</el-menu-item></router-link>
          
        </el-menu-item-group>
      </el-submenu>



      <el-menu-item index="2"><i class="el-icon-menu"></i>销售管理</el-menu-item>





      <el-menu-item index="3"><i class="el-icon-setting"></i>采购管理</el-menu-item>
    </el-menu>
  </el-col>
</el-row>


     
      
        <li class="header">标签</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>一般</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>普通</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      }
    }

}
</script>

<style>
  .dark {
    background-color: #222d32;
}
.is-active{
      background-color: #324057;
}

</style>
