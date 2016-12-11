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
  <li class="treeview active">
          <a href="#">
            <i class="fa fa-share"></i> <span>系统设置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu menu-open" style="display: block;">
            <li> <router-link to="/auth/permission"><i class="fa fa-circle-o"></i> 权限管理</router-link></li>
             <li>   <router-link to="/auth/role"><i class="fa fa-circle-o"></i> 角色管理</router-link></li>
              <li>

               <router-link to="/auth/user">   <i class="fa fa-circle-user"></i> 用户管理
               </router-link></li>

                <li>

               <router-link to="/auth/menus">   <i class="fa fa-circle-user"></i> 菜单管理
               </router-link></li>
   

            </ul>
            </li>





     
      
        <li class="header">标签</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>一般</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>普通</span></a></li>
<!-- 
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-share"></i> <span>系统设置</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu menu-open" style="display: block;">
            <li><a href="#"><i class="fa fa-circle-o"></i> 权限管理</a></li>
            <li class="active">
              <a href="#"><i class="fa fa-circle-o"></i> 角色管理
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li> -->
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
